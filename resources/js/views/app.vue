<template>
<div class="pb-16">
	<nav-bar></nav-bar>

    <main class="pt-6">	
		<transition tag="div" name="fade" appear>
		    <component :is="data.name" :parentData="childProps" @title="setTitle"></component>
		</transition>
    </main>
</div>
</template>

<script>
import NavBar from '@/components/nav'

export default {
	props: {
		data: {
			type: Object,
			required: false
		}
	},

	data()
	{
		return {
			title: ''
		}
	},

	computed: {
		childProps()
		{
			let props = Object.assign({}, this.data)
			
			delete props.shop
			delete props.name

			return props
		}
	},

	components: {
		NavBar
	},

	methods: {
		setTitle(title)
		{
			this.title = title
		}
	}
}
</script>