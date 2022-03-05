<template>
    <div class="w-full">
        <input
            class="w-full bg-gray-50 rounded-sm p-2 shadow-md"
            type="text"
            @keydown="handleInput"
            v-model="searchText"
        >
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
            setTimeout(() => this.$emit('search', this.searchText), 200)
        }
    }
}
</script>
