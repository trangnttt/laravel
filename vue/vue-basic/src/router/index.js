import Vue from 'vue'
import Router from 'vue-router'
import aboutRouter from '@/router/modules/about'
import loginRouter from '@/router/modules/login'

Vue.use(Router)

export default new Router({
	mode: 'history',
	routes: [
		...aboutRouter,
		...loginRouter
	]
})
