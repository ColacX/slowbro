'use strict';

self.addEventListener('push', function(event) {
	console.log('[Service Worker] Push Received.');
	console.log(`[Service Worker] Push had this data: "${event.data.text()}"`);
	console.log(event);

	const title = 'Push Received';
	const options = {
		body: 'Reservations updated',
		icon: 'images/pikachu_dancing.gif',
		badge: 'images/pikachu_sleeping.gif'
	};

	event.waitUntil(self.registration.showNotification(title, options));
});
