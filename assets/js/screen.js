function sync(data = {}) {
  if (data.method === 'Kemenag') {
    var params = adhan.CalculationMethod.Singapore();

    params.adjustments.fajr = 2 + data['adjustments.fajr'];
    params.adjustments.sunrise = 2 + data['adjustments.sunrise'];
    params.adjustments.dhuhr = 2 + data['adjustments.dhuhr'];
    params.adjustments.asr = 2 + data['adjustments.asr'];
    params.adjustments.maghrib = 2 + data['adjustments.maghrib'];
    params.adjustments.isha = 2 + data['adjustments.isha'];
  } else {
    var params = adhan.CalculationMethod[data.method]();

    params.adjustments.fajr = data['adjustments.fajr'];
    params.adjustments.sunrise = data['adjustments.sunrise'];
    params.adjustments.dhuhr = data['adjustments.dhuhr'];
    params.adjustments.asr = data['adjustments.asr'];
    params.adjustments.maghrib = data['adjustments.maghrib'];
    params.adjustments.isha = data['adjustments.isha'];
  }

  var coordinates = new adhan.Coordinates(-6.5414161, 107.4550443);
  var date = moment().locale(data.locale).toDate();
  var prayerTimes = new adhan.PrayerTimes(coordinates, date, params);
  var nextDate = moment().add(1, 'day').locale(data.locale).toDate();
  var nextPrayerTimes = new adhan.PrayerTimes(coordinates, nextDate, params);

  $('#fajr').html(moment(prayerTimes.fajr).locale(data.locale).format('HH:mm'));
  $('#sunrise').html(moment(prayerTimes.sunrise).locale(data.locale).format('HH:mm'));
  $('#dhuhr').html(moment(prayerTimes.dhuhr).locale(data.locale).format('HH:mm'));
  $('#asr').html(moment(prayerTimes.asr).locale(data.locale).format('HH:mm'));
  $('#maghrib').html(moment(prayerTimes.maghrib).locale(data.locale).format('HH:mm'));
  $('#isha').html(moment(prayerTimes.isha).locale(data.locale).format('HH:mm'));

  $('#'.concat(prayerTimes.currentPrayer())).parent().css('color', 'var(--active-color)');

  if (prayerTimes.nextPrayer() !== 'none') {
    var name = $('#'.concat(prayerTimes.nextPrayer())).siblings().first().text();
    var time = moment(prayerTimes[prayerTimes.nextPrayer()]).locale(data.locale).format('HH:mm');

    $('#next > span').html(name.concat(' '.concat(time)));
  } else {
    var name = $('#'.concat(nextPrayerTimes.nextPrayer())).siblings().first().text();
    var time = moment(nextPrayerTimes[nextPrayerTimes.nextPrayer()]).locale(data.locale).format('HH:mm');

    $('#next > span').html(name.concat(' '.concat(time)));
  }

  $('#day').html(moment().locale(data.locale).format('dddd').replace('Minggu', 'Ahad'));
  $('#masehi').html(moment().locale(data.locale).format('DD MMMM YYYYY') + ' M');
  $('#hijri').html(moment().locale(data.locale).add(data['adjustment.hijri'], 'days').format('iDD iMMMM iYYYY') + ' H');
  $('#clock').html(moment().locale(data.locale).format('HH:mm:ss'));
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
    gap: '5'
  });
}

window.addEventListener('load', init);
