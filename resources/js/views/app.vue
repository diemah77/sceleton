<template>
<div class="pb-16">
	<nav-bar :path="route().current()"></nav-bar>

    <main class="pt-6">	
		<transition tag="div" name="fade" mode="out-in">
		    <component :is="locComponent" :props="locData" :key="pathname"></component>
		</transition>
    </main>
</div>
</template>

<script>
import NavBar from '@/components/nav'

export default {
	props: {
		props: {
			type: Object,
			required: false
		},
		component: {
			type: String,
			required: true
		},
		shop: {
			type: Object,
			reuqired: true
		}
	},

	data()
	{
		return {
			locData: this.props,
			locComponent: this.component,
			locShop: this.shop,
			pathname: window.location.pathname
		}
	},

	components: {
		NavBar
	},

	methods: {
		setTitle(title)
		{
			this.title = title
		},

		visit(url, pushState)
		{
			axios.get(url).then(response => 
			{
				this.locComponent = response.data.data.component
				this.locData = response.data.data.props
			
				if (pushState)
				{
					history.pushState(null, null, url)
				}
			})
		}
	},

	created()
	{
		window.addEventListener('popstate', event => 
		{
			this.visit(location.href, false)
		})

		this.$root.$on('page-change', url =>
		{
			this.visit(url, true)
		})
	}
}
</script>

<style>
.fade-enter-active, .fade-leave-active {
  	transition: opacity .3s ease;

}
.fade-enter, .fade-leave-active {
  	opacity: 0;
}
</style>