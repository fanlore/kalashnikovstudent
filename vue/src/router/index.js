import {createRouter, createWebHistory} from "vue-router";

import Login from "../views/Login.vue";
import Register from "../views/Register.vue";

import Dashboard from "../views/Dashboard.vue";
import Profile from "../views/Profile.vue";

import UsersIndex from "../views/Admin/Users/UsersIndex.vue";
import UsersView from "../views/Admin/Users/UsersView.vue";

import GroupsIndex from "../views/Admin/Groups/GroupsIndex.vue";
import GroupsView from "../views/Admin/Groups/GroupsView.vue";

import DisciplinesIndex from "../views/Admin/Disciplines/DisciplinesIndex.vue";
import DisciplinesView from "../views/Admin/Disciplines/DisciplinesView.vue";

import LessonsIndex from "../views/Teacher/Lessons/LessonsIndex.vue";
import LessonsView from "../views/Teacher/Lessons/LessonsView.vue";
import LessonHomeworks from "../views/Teacher/Lessons/LessonHomeworks.vue";
import LessonHomeworkView from "../views/Teacher/Lessons/LessonHomeworkView.vue";

import StudentLessonIndex from "../views/Student/Lessons/StudentLessonIndex.vue";

import DefaultLayout from "../components/DefaultLayout.vue";
import AuthLayout from "../components/AuthLayout.vue"

import NotFound from "../components/NotFound.vue";

import store from "../store";

const routes = [
  {
    path:'/',
    redirect:'/dashboard',
    component:DefaultLayout,
    meta:{
      requiresAuth: true
    },
    children:[
      {
        path:'/dashboard', name:'Dashboard',component:Dashboard
      },
      {
        path:'/profile', name:'Profile',component:Profile
      },
      {
        path:'/teacher/lessons', name:'LessonsIndex',component:LessonsIndex,
      },
      {
        path:'/teacher/lessons/:id', name:'LessonsView',component:LessonsView,
      },
      {
        path:'/teacher/lessons/:id/homeworks', name:'LessonHomeworks',component:LessonHomeworks,
      },
      {
        path:'/teacher/lessons/homework/:id/:lessonId', name:'LessonHomeworkView',component:LessonHomeworkView,
        props:true
      },
      {
        path:'/teacher/lessons/create/:discipline_id', name:'LessonsCreate',component:LessonsView,
      },
      {
        path:'/admin/users', name:'UsersIndex',component:UsersIndex,
        meta:{
          requiresAdmin:true
        }
      },
      {
        path:'/admin/users/:id', name:'UsersView',component:UsersView,
      },
      {
        path:'/admin/users/create', name:'UsersCreate',component:UsersView,
      },
      {
        path:'/admin/groups/:id', name:'GroupsView',component:GroupsView,
      },
      {
        path:'/admin/groups/create', name:'GroupsCreate',component:GroupsView,
      },
      {
        path:'/admin/groups', name:'GroupsCreate',component:GroupsIndex,
      },
      {
        path:'/admin/disciplines/:id', name:'DisciplinesView',component:DisciplinesView,
      },
      {
        path:'/admin/disciplines/create', name:'DisciplinesCreate',component:DisciplinesView,
      },
      {
        path:'/admin/disciplines', name:'DisciplinesCreate',component:DisciplinesIndex,
      },
      {
        path: '/student/lesson/:id', name: 'StudentLessonIndex', component: StudentLessonIndex
      }
    ]
  },
  {
    path:'/auth',
    redirect:'/login',
    name:'Auth',
    component:AuthLayout,
    meta:{
      isGuest:true,
    },
    children:[
      {
        path:'/login',
        name:'Login',
        component:Login,
      },
      {
        path:'/register',
        name:'Register',
        component:Register,
      }
    ]
  },
  {
    path: "/:catchAll(.*)",
    name: "NotFound",
    component: NotFound,
  },

];

const router = createRouter({
  history:createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  if(to.meta.requiresAuth && !store.state.user.token) {
    next({name: 'Login'});
  }else if(store.state.user.token && (to.meta.isGuest)) {
    next({name: 'Dashboard'});
  }else {
    next()
  }

})

export default router;
