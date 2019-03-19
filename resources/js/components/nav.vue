<template>
<div class="flex border-solid border-b border-sky">
	<a 
		:href="route('home')"
		class="no-underline -mb-px mt-px px-4"
		:class="{'text-ink-lighter hover:text-ink': !route().current('home'), 'text-ink': route().current('home')}">
		
		<div :class="{'flex py-4 border-b-2 border-solid border-transparent hover:border-b-2 hover:border-solid hover:border-sky': true, 'hover:border-indigo border-indigo': route().current('home')}">
			<span>Dashboard</span>
		</div>
	</a>

	<a 
		:href="route('test')"
		class="no-underline -mb-px mt-px px-4"
		:class="{'text-ink-lighter hover:text-ink': !route().current('test'), 'text-ink': route().current('test')}">
		
		<div :class="{'flex py-4 border-b-2 border-solid border-transparent hover:border-b-2 hover:border-solid hover:border-sky': true, 'hover:border-indigo border-indigo': route().current('test')}">
			<span>Test</span>
		</div>
	</a>
</div>
</template>