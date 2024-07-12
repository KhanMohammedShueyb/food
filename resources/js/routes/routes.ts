import Vue from 'vue'
import VueRouter, { RouteConfig } from 'vue-router'
// import { component } from 'vue/types/umd'
// const Auth = () => import('../components/auth/Auth.vue')

const foodadmin = () => import('../components/foodAdminDashboard/FoodLayout/Header.vue')
// const CalenderDialog = () => import('../components/foodAdminDashboard/Dashboard/DashboardComponents/CalenderDialog.vue')
const dashboard = () => import('../components/foodAdminDashboard/Dashboard/dashboard.vue')
const Products = () => import('../components/foodAdminDashboard/Dashboard/Tables/Products/Products.vue')
const UserGroup = () => import('../components/foodAdminDashboard/Dashboard/Tables/UserGroup/UserGroup.vue')
const UserGroupPermission = () => import('../components/foodAdminDashboard/Dashboard/Tables/UserGroupPermission/UserGroupPermission.vue')
const Offerss = () => import('../components/foodAdminDashboard/Dashboard/Tables/Offers/Offer.vue')
const Orderss = () => import('../components/foodAdminDashboard/Dashboard/Tables/Orders/Order.vue')
const Userss = () => import('../components/foodAdminDashboard/Dashboard/Tables/Users/Users.vue')
const Category = () => import('../components/foodAdminDashboard/Dashboard/Tables/Category/Category.vue')
const Subcategory = () => import('../components/foodAdminDashboard/Dashboard/Tables/Subcategory/Subcategory.vue')
const userproducts = () => import('../components/foodAdminDashboard/UserDashboard/Tables/UserProducts.vue')
const UserOrderss = () => import('../components/foodAdminDashboard/UserDashboard/Tables/UserOrder.vue')
const Ordersdetail = () => import('../components/foodAdminDashboard/Dashboard/Tables/OrdersDetails/OrderDetail.vue')
// const userdashboard  = () => import('../components/foodAdminDashboard/UserDashboard/userdashboard.vue')
const login = () => import('../components/login_signup/login.vue')
const signup = () => import('../components/login_signup/signup.vue')
const bucketpage = () => import('../components/foodAdminDashboard/FoodLayout/BucketComp.vue')
const CalenderDialog = () => import('../components/foodAdminDashboard/Dashboard/DashboardComponents/CalenderDialog.vue')
const Verify = () => import('../components/login_signup/verify.vue')
const User = () => window.sessionStorage.getItem('User');
const token = () => window.sessionStorage.getItem('token');
const CellPhone = () => import('../components/foodAdminDashboard/Dashboard/CellPhoneRepair/landingPageComponents/CellPhone.vue')
const CrouselComp = () => import('../components/foodAdminDashboard/Dashboard/CellPhoneRepair/landingPageComponents/CrouselComp.vue')
const Header = () => import('../components/foodAdminDashboard/Dashboard/CellPhoneRepair/header/header.vue')
Vue.use(VueRouter);
const routes: Array<RouteConfig> = [
  {  
    path: "/dashboard",
    component:foodadmin,
    name:"Header",
    children: [
      {
        path: '',
        name: "dashboard",
        component:dashboard
      },
      {
        path: 'Productss',
        name: 'Productss',
        component: Products
      },
      {
        path: 'Usergroup',
        name: 'UserGroup',
        component: UserGroup
      },
      {
        path: 'UserGroupPermission',
        name: 'UserGroupPermission',
        component: UserGroupPermission
      },
      {
        path: 'Offerss',
        name: 'Offerss',
        component: Offerss
      },
      {
        path: 'Orderss',
        name: 'Orderss',
        component: Orderss
      },
      {
        path: 'Orderdetails',
        name: 'OrderDetailss',
        component: Ordersdetail
      },
      {
        path: 'Userss',
        name: 'Userss',
        component: Userss
      },
      {
        path: 'Category',
        name: 'Categoriess',
        component: Category
      },
      {
        path: 'Subcategory',
        name: 'subcategoriess',
        component: Subcategory
      },
      {
        path: '/Userproducts',
        name: 'userproducts',
        component: userproducts
      },
      {
        path: '/UserOrders',
        name: 'UserOrderss',
        component: UserOrderss
      },
      // {
      //   path: '/Userdashboard',
      //   name: 'userdashboard ',
      //   component: userdashboard 
      // },
      {
        path: '/bucket',
        name: 'bucketpage ',
        component: bucketpage 
      },
      {
        path: 'calender',
        name: 'CalenderDialog ',
        component: CalenderDialog 
      },
    ]
  },
  {
    path: '/',
    name: 'logins',
    component: login
  },
  {
    path: '/signup',
    name: 'signups',
    component: signup
  },
  {
    path: '/verify',
    name: 'verify',
    component: Verify
  },
  {
    path: "/phone",
    name: "CellPhone",
    component: CellPhone
  },
  {
    path: "/Crousel",
    name: "CrouselComp",
    component: CrouselComp
  },
  {
    path: "/header",
    name: "header",
    component: Header
  }
  
]

const router = new VueRouter({
  mode: 'history',
//   base: process.env.BASE_URL,
  routes
})


export default router
