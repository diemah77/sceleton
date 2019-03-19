<template>
<page fullWidth>
	<polaris-empty-state
		class="mt-0 pt-0"
	    heading="Welcome to our App!"
	    image="/img/Ad.svg">
	    
	    <p>You have not created anything yet!</p>
	</polaris-empty-state>
</page>
</template>

<script>
import page from '@/mixins/page'

export default {
	mixins: [page],

	data()
	{
		return {
			title: 'Dashboard',
		}
	},
}
</script>