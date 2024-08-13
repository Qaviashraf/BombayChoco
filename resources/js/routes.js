const routes = [
    {
        name: 'dashboard', path: '/dashboard', component: require('./components/dashboard.vue').default
    },
    {
        name: 'roles', path: '/roles', component: require('./components/roles.vue').default
    },
    {
        name: 'permissions', path: '/permissions', component: require('./components/permissions.vue').default
    },
    {
        name: 'users', path: '/users', component: require('./components/users.vue').default
    },
    {
        name: 'settings', path: '/settings', component: require('./components/settings.vue').default
    },
    {
        name: 'profile', path: '/profile', component: require('./components/profile.vue').default
    },
    {
        name: 'productCategories', path: '/productCategories', component: require('./components/productCategories.vue').default
    },
    {
        name: 'products', path: '/products', component: require('./components/products.vue').default
    },
    {
        name: 'paymentMethods', path: '/paymentMethods', component: require('./components/paymentMethods.vue').default
    },
    {
        name: 'orders', path: '/orders', component: require('./components/orders.vue').default
    },
    {
        name: 'brands', path: '/brands', component: require('./components/brands.vue').default
    },
    {
        name: 'homeSliders', path: '/homeSliders', component: require('./components/homeSliders.vue').default
    },
    {
        name: 'productFlavours', path: '/productFlavours', component: require('./components/productFlavours.vue').default
    },
    {
        name: 'orderStatus', path: '/orderStatus', component: require('./components/orderStatus.vue').default
    },
    {
        name: 'cities', path: '/cities', component: require('./components/cities.vue').default
    },
];
export default routes;