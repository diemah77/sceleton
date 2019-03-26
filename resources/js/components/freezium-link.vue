<template>
<a @click.prevent="visit(href)" :href="href">
	<slot></slot>	
</a>
</template>

<script>

export default {
	props: {
		href: {
			type: String,
			required: true
		}
	}
}
</script>