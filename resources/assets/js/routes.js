export default [
    { path: '/user/:pid', name: 'user', component: require('./components/User') },
    { path: '/user/:pid/profile', name: 'user-profile', component: require('./components/Profile') },
    { path: '/user/:pid/settings', name: 'user-settings', component: require('./components/Settings') },
];