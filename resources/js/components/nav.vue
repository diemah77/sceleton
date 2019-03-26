<template>
<div class="flex border-solid border-b border-sky">
	<freezium-link 
		:href="route('home')"
		class="no-underline -mb-px mt-px px-4"
		:class="{'text-ink-lighter hover:text-ink': !current('home'), 'text-ink': current('home')}">
		
		<div :class="{'flex py-4 border-b-2 border-solid border-transparent hover:border-b-2 hover:border-solid hover:border-sky': true, 'hover:border-indigo border-indigo': current('home')}">
			<span>Dashboard</span>
		</div>
	</freezium-link>

	<freezium-link 
		:href="route('test')"
		class="no-underline -mb-px mt-px px-4"
		:class="{'text-ink-lighter hover:text-ink': !current('test'), 'text-ink': current('test')}">
		
		<div :class="{'flex py-4 border-b-2 border-solid border-transparent hover:border-b-2 hover:border-solid hover:border-sky': true, 'hover:border-indigo border-indigo': current('test')}">
			<span>Test</span>
		</div>
	</freezium-link>
</div>
</template>

<script>
export default {
	props: {
		path: {
			type: String,
			required: true
		}
	},

	methods: {
		current(path)
		{
			return this.path == path
		}
	}
}
</script>