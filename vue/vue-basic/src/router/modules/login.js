import login from '@/views/auth/login/'

export default [
	{
		path: '/login',
		name: 'login',
		component: login,
		meta: { layout: 'login' }
	}
]
