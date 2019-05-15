var $$ = Dom7;
var app = new Framework7({
    // App root element
    root: '#app',
    // App Name
    name: 'My App',
    // App id
    id: 'com.myapp.test',
    // Enable swipe panel
    panel: {
        swipe: 'left',
    },
    // Add default routes
    routes: [
        {
            path: '/about/',
            url: 'about.html',
    },
  ],
    // ... other parameters


});
var notificationClickToClose = app.notification.create({
    icon: '<i class="icon demo-icon">7</i>',
    title: 'Framework7',
    titleRightText: 'now',
    subtitle: 'Notification with close on click',
    text: 'Click me to close',
    closeOnClick: true,
})
$$('.open-click-to-close').on('click', function () {
    notificationClickToClose.open();
});
