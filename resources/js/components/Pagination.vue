<template>
    <div class="w-full flex justify-center">
        <button
            v-if="currentPage > 1"
            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
            @click="$emit('paginationButtonClicked', 1)"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </button>
        <button v-for="i in buttons"
                class="relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                :class="currentPage === i ? activeClass : inactiveClass"
                @click="$emit('paginationButtonClicked', i)"
        >
            {{ i }}
        </button>
        <button
            v-if="currentPage < maxPages"
            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
            @click="$emit('paginationButtonClicked', maxPages + 1)"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </button>
    </div>
</template>

<script>
export default {
    name: "Pagination",
    data() {
        return {
            activeClass: 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600',
            inactiveClass: 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'
        }
    },
    props: {
        currentPage: {
            type: Number,
            required: true,
            default: 1
        },
        totalPages: {
            type: Number,
            required: true,
            default: 1
        },
        maxPages: {
            type: Number,
            required: true,
            default: 6
        }
    },
    computed: {
        buttons() {
            let maxPages = this.$props.maxPages
            let totalPages = this.$props.totalPages
            let totalButtons = totalPages < maxPages ? totalPages : maxPages
            let currentPage = this.$props.currentPage
            let startingNumber = currentPage < maxPages ? currentPage : maxPages
            let buttons = [];
            while (buttons.length < totalButtons) {
                buttons.push(startingNumber)
                startingNumber++
            }
            return buttons
        },
    }
}
</script>
