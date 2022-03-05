<template>
    <div>
        <input type="text" @keydown="handleInput" v-model="searchText">
    </div>
</template>

<script>
export default {
    name: "PaymentSearch",
    data() {
        return {
            searchText: ''
        }
    },
    methods: {
        handleInput() {
            setTimeout(() => this.$emit('search', this.searchText), 600)
        }
    }
}
</script>
