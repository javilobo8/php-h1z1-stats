var tiers = {
  '1': 'Bronze',
  '2': 'Silver',
  '3': 'Gold',
  '4': 'Platinum',
  '5': 'Diamond',
  '6': 'Royalty',
};
var base = '/h1z1/';
var uri = base + 'h1z1.php?filterKey=' + filterKey + '&name=' + name;

function getImageByTier(tier) {
  return 'https://www-cdn.h1z1.com/images/leaderboards/king-of-the-kill/tiers/tier-' + tier + '.png';
}

function toDecimal(n) { return Math.round(parseFloat(n) * 100) / 100; }

function getData() {
  axios.get(uri)
    .then(function (response) {
      var data = response.data.successPayload.rows[0].values;
      data.position = response.data.successPayload.rows[0].position;
      data.detail = null;
      update(data);
    })
    .catch(function (error) {
      console.log(error);
    });
  setTimeout(getData, 1000 * 60 * 10);
}

function update(data) {
  $('#userName').text(data['user_name']);
  $('.tierIcon').css({ 'background-image' : 'url(' + getImageByTier(data.tier) + ')' });
  $('#tierDetails').html(tiers[data.tier] + ' ' + data.subtier + ' <small>(S' + data.season + ')</small>');

  $('#killsPerMatch').text(toDecimal(data['kills_per_match']) + ' kills per match');
  $('#top').text('Top #' + data['position'].toLocaleString());
  $('#totalKills').text(parseFloat(data['total_kills']).toLocaleString());
  $('#winsLosses').text(parseFloat(data['total_wins']).toLocaleString() + ' / ' + (parseFloat(data['total_matches']) - parseFloat(data['total_wins'])).toLocaleString());
  $('#winsPerMatch').text(toDecimal(parseFloat(data['wins_per_match']) * 100) + ' %');

  $('#top10TotalScore').text(parseFloat(data['top_10_total_score']).toLocaleString());

  $('.container').slideDown(400);
}

function init() {
  getData();
}

init();