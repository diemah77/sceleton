const mix = require('laravel-mix');
const tailwind = require('tailwindcss')
const webpack = require('webpack')
const cleaner = require('clean-webpack-plugin')
require('laravel-mix-purgecss')

mix.copy('node_modules/element-ui/lib/theme-chalk/fonts', 'public/css/fonts')

mix.options({
    processCssUrls: false,
})

mix.js('resources/js/app.js', 'js/app.js').extract()

mix.sass('resources/sass/app.scss', 'css/app.css').options(
{
	postCss: [
  		tailwind('./resources/sass/tailwind.js'),
	]
})

if (mix.inProduction) {
	mix.version().purgeCss({
		globs: [
	        path.join(__dirname, 'node_modules/element-ui/**/*.js'),
	        path.join(__dirname, '@eastsideco/polaris-vue/**/*.js'),
	    ],

	    whitelistPatterns: [/el-/, /Polaris-/]
	})
}

mix.webpackConfig({
	resolve: {
    	alias: {
      		'@': __dirname + '/resources/js'
    	}
  	},
	plugins: [
		new webpack.NormalModuleReplacementPlugin(/element-ui[\/\\]lib[\/\\]locale[\/\\]lang[\/\\]zh-CN/, 'element-ui/lib/locale/lang/en'),
    	new cleaner(['./public/js'])
  	],
})