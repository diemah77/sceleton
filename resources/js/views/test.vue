<template>
<page fullWidth>
	Test
</page>
</template>

<script>
import page from '@/mixins/page'

export default {
	mixins: [page],

	data()
	{
		return {
			title: 'Test',
		}
	},
}
</script>