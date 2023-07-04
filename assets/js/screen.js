function method(data = {}) {
  if (data.method === 'Kemenag') {
    var params = adhan.CalculationMethod.Singapore();

    params.adjustments.fajr = 2 + data['adjustments.fajr'];
    params.adjustments.sunrise = 2 + data['adjustments.sunrise'];
    params.adjustments.dhuhr = 2 + data['adjustments.dhuhr'];
    params.adjustments.asr = 2 + data['adjustments.asr'];
    params.adjustments.maghrib = 2 + data['adjustments.maghrib'];
    params.adjustments.isha = 2 + data['adjustments.isha'];

    return params;
  }

  var params = adhan.CalculationMethod[data.method]();

  params.adjustments.fajr = data['adjustments.fajr'];
  params.adjustments.sunrise = data['adjustments.sunrise'];
  params.adjustments.dhuhr = data['adjustments.dhuhr'];
  params.adjustments.asr = data['adjustments.asr'];
  params.adjustments.maghrib = data['adjustments.maghrib'];
  params.adjustments.isha = data['adjustments.isha'];

  return params;
}

function sync(data = {}) {
  var coordinates = new adhan.Coordinates(data.latitude, data.longitude);
  var date = moment().locale(data.locale).toDate();
  var prayer = new adhan.PrayerTimes(coordinates, date, method(data));
  var tomorrow = moment().add(1, 'day').locale(data.locale).toDate();
  var nextPrayer = new adhan.PrayerTimes(coordinates, tomorrow, method(data));

  var fajr = moment(prayer.fajr).locale(data.locale).format('HH:mm');
  var sunrise = moment(prayer.sunrise).locale(data.locale).format('HH:mm');
  var dhuhr = moment(prayer.dhuhr).locale(data.locale).format('HH:mm');
  var asr = moment(prayer.asr).locale(data.locale).format('HH:mm');
  var maghrib = moment(prayer.maghrib).locale(data.locale).format('HH:mm');
  var isha = moment(prayer.isha).locale(data.locale).format('HH:mm');

  $('#fajr').html(fajr);
  $('#sunrise').html(sunrise);
  $('#dhuhr').html(dhuhr);
  $('#asr').html(asr);
  $('#maghrib').html(maghrib);
  $('#isha').html(isha);

  $('#'.concat(prayer.currentPrayer())).parent().css('color', 'var(--active-color)');

  if (prayer.nextPrayer() !== 'none') {
    var name = $('#'.concat(prayer.nextPrayer())).siblings().first().text();
    var time = moment(prayer[prayer.nextPrayer()]).locale(data.locale).format('HH:mm');

    $('#next > span').html(name.concat(' '.concat(time)));
  } else {
    var name = $('#'.concat(nextPrayer.nextPrayer())).siblings().first().text();
    var time = moment(nextPrayer[nextPrayer.nextPrayer()]).locale(data.locale).format('HH:mm');

    $('#next > span').html(name.concat(' '.concat(time)));
  }

  var day = moment().locale(data.locale).format('dddd').replace('Minggu', 'Ahad');
  var masehi = moment().locale(data.locale).format('DD MMMM YYYYY') + ' M';
  var hijri = moment().locale(data.locale).add(data['adjustment.hijri'], 'days').format('iDD iMMMM iYYYY') + ' H';
  var clock = moment().locale(data.locale).format('HH:mm:ss');

  $('#day').html(day);
  $('#masehi').html(masehi);
  $('#hijri').html(hijri);
  $('#clock').html(clock);
}

function init() {
  var data = JSON.parse($('#data').text());

  sync(data);
  setInterval(function () { sync(data) }, 1000);

  $('footer p').marquee({
    speed: 50,
    duplicated: true,
    startVisible: true,
    direction: 'left',
    allowCss3Support: true,
    easing: 'linear',
    gap: '10'
  });
}

window.addEventListener('load', init);
