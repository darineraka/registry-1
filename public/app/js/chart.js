/**
 * Executes an AJAX callback
 *
 * @param  {String}   method
 * @param  {String}   endpoint
 * @param  {Array}    parameters
 * @param  {Function} callback
 *
 * @return {void}
 */
function getJSON(endpoint, callback) {
	var ajax = new XMLHttpRequest;

	// Create request
	ajax.open('GET', endpoint+'/', false);
	ajax.send();

	// Get results
	return JSON.parse(ajax.response);
}

// Get packages
var packages = getJSON('packages/history');
var context = document.getElementById('packages').getContext('2d');
var chart   = new Chart(context).Line({
	labels: packages.labels,
	datasets: [
		{
			fillColor : "rgba(248, 110, 91, 0.50)",
			strokeColor : "rgba(212, 101, 86, 1)",
			pointColor : "rgba(187, 90, 75, 1)",
			pointStrokeColor : "#fff",
			data: packages.data
		}
	],
}, {
	bezierCurve: false,
});