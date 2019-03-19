export default {
    props: ['parentData'],
    
	data()
    {
        return {
            title: 'Dashboard'
        }
    },

	created()
    {
        this.$emit('title', this.title)
    }
}