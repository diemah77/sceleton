<template>
<div :class="{'Polaris-Page': true, 'Polaris-Page--fullWidth': fullWidth, 'Polaris-Page--singleColumn': singleColumn}">
	<div v-if="title" class="Polaris-Page__Header">
        <div class="Polaris-Page__Title">
            <h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">
                {{ title }}
            </h1>

            <div class="">
	        	<slot name="meta"></slot>	
	        </div>
        </div>
    </div>

    <div class="Polaris-Page__Content">
        <slot></slot>
    </div>
</div>
</template>

<script>
export default {
    props: {
    	title: String,
        fullWidth: Boolean,
        singleColumn: Boolean,
    }
}
</script>