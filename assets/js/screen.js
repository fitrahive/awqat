function getParams(data = {}) {
  if (data.method === "Kemenag") {
    var params = adhan.CalculationMethod.Singapore();

    params.adjustments.fajr = 2 + data["adjustment.fajr"];
    params.adjustments.sunrise = 2 + data["adjustment.sunrise"];
    params.adjustments.dhuhr = 2 + data["adjustment.dhuhr"];
    params.adjustments.asr = 2 + data["adjustment.asr"];
    params.adjustments.maghrib = 2 + data["adjustment.maghrib"];
    params.adjustments.isha = 2 + data["adjustment.isha"];

    return params;
  }

  var params = adhan.CalculationMethod[data.method]();

  params.adjustments.fajr = data["adjustment.fajr"];
  params.adjustments.sunrise = data["adjustment.sunrise"];
  params.adjustments.dhuhr = data["adjustment.dhuhr"];
  params.adjustments.asr = data["adjustment.asr"];
  params.adjustments.maghrib = data["adjustment.maghrib"];
  params.adjustments.isha = data["adjustment.isha"];

  return params;
}

function realtime() {
  var data = JSON.parse(localStorage.getItem("data"));

  // prepare adhan-js
  var coordinates = new adhan.Coordinates(data.latitude, data.longitude);
  var date = moment().locale(data.locale).toDate();
  var prayer = new adhan.PrayerTimes(coordinates, date, getParams(data));
  var tomorrow = moment().add(1, "day").locale(data.locale).toDate();
  var nextPrayer = new adhan.PrayerTimes(
    coordinates,
    tomorrow,
    getParams(data)
  );

  // parse prayer times (using moment-js)
  var fajr = moment(prayer.fajr).locale(data.locale).format("HH:mm");
  var sunrise = moment(prayer.sunrise).locale(data.locale).format("HH:mm");
  var dhuhr = moment(prayer.dhuhr).locale(data.locale).format("HH:mm");
  var asr = moment(prayer.asr).locale(data.locale).format("HH:mm");
  var maghrib = moment(prayer.maghrib).locale(data.locale).format("HH:mm");
  var isha = moment(prayer.isha).locale(data.locale).format("HH:mm");

  // prayer times
  $("#fajr").html(fajr);
  $("#sunrise").html(sunrise);
  $("#dhuhr").html(dhuhr);
  $("#asr").html(asr);
  $("#maghrib").html(maghrib);
  $("#isha").html(isha);

  // active prayer time
  $("#prayer-times > div").removeAttr("style");
  $("#".concat(prayer.currentPrayer()))
    .parent()
    .css("color", "var(--active-color)");

  // set next prayer time
  if (prayer.nextPrayer() !== "none") {
    var name = data.label[prayer.nextPrayer()];
    var time = moment(prayer[prayer.nextPrayer()])
      .locale(data.locale)
      .format("HH:mm");

    $("#next > span").html(name.concat(" ".concat(time)));
  } else {
    var name = data.label[nextPrayer.nextPrayer()];
    var time = moment(nextPrayer[nextPrayer.nextPrayer()])
      .locale(data.locale)
      .format("HH:mm");

    $("#next > span").html(name.concat(" ".concat(time)));
  }

  // parse day and clock (using moment-js)
  var day = moment()
    .locale(data.locale)
    .format("dddd")
    .replace("Minggu", "Ahad");
  var masehi = moment().locale(data.locale).format("DD MMMM YYYYY") + " M";
  var hijri =
    moment()
      .locale(data.locale)
      .add(data["adjustment.hijri"], "days")
      .format("iDD iMMMM iYYYY") + " H";
  var clock = moment().locale(data.locale).format("HH:mm:ss");

  // day and clock
  $("#day").html(day);
  $("#masehi").html(masehi);
  $("#hijri").html(hijri);
  $("#clock").html(clock);
}

function handleMosque(current, update) {
  // mosque name
  if (!("name" in current) || current.name !== update.name) {
    $("title").html(update.name);
    $("h1").html(update.name);
  }

  // mosque address
  if (!("address" in current) || current.address !== update.address) {
    $("h1 + p").html(update.address);
  }
}

// label for prayer times
function handleLabel(current, update) {
  if (!("fajr" in current) || current.fajr !== update.fajr) {
    $("#fajr").parent().find("small").html(update.fajr);
  }

  if (!("sunrise" in current) || current.sunrise !== update.sunrise) {
    $("#sunrise").parent().find("small").html(update.sunrise);
  }

  if (!("dhuhr" in current) || current.dhuhr !== update.dhuhr) {
    $("#dhuhr").parent().find("small").html(update.dhuhr);
  }

  if (!("asr" in current) || current.asr !== update.asr) {
    $("#asr").parent().find("small").html(update.asr);
  }

  if (!("maghrib" in current) || current.maghrib !== update.maghrib) {
    $("#maghrib").parent().find("small").html(update.maghrib);
  }

  if (!("isha" in current) || current.isha !== update.isha) {
    $("#isha").parent().find("small").html(update.isha);
  }
}

// running text
function handleQuotes(current, update) {
  if (JSON.stringify(current) !== JSON.stringify(update)) {
    $("footer > p")
      .html([...update, ""].join(" • "))
      .marquee({
        speed: 50,
        duplicated: true,
        startVisible: true,
        direction: "left",
        allowCss3Support: true,
        easing: "linear",
        gap: "10",
      });
  }
}

function sync(data) {
  $.ajax({
    method: "GET",
    url: window.location.href + "/sync",
    success: function (update) {
      if (data.theme !== update.theme) {
        localStorage.setItem("data", JSON.stringify(update));
        $("#reload").removeClass("hidden");

        return window.location.reload();
      }

      // update mosque name and address
      handleMosque(
        { name: data.name, address: data.address },
        { name: update.name, address: update.address }
      );
      // update prayer times label
      handleLabel(data.label, update.label);
      // update running text
      handleQuotes(data.quotes, update.quotes);

      localStorage.setItem("data", JSON.stringify(update));
      sync(update);
    },
  });
}

function init() {
  var screenWidth =
    window.innerWidth ||
    document.documentElement.clientWidth ||
    document.body.clientWidth;

  if (screenWidth < 1024) {
    window.location.href = window.location.href + "/screen";
    return;
  }

  var data = JSON.parse(localStorage.getItem("data"));

  // initializing mosque name and address
  handleMosque({}, { name: data.name, address: data.address });
  // initializing prayer times label
  handleLabel({}, data.label);
  // initializing running text
  handleQuotes({}, data.quotes);

  sync(data);
  realtime();
  setInterval(realtime, 1000);
}

window.addEventListener("DOMContentLoaded", init);
