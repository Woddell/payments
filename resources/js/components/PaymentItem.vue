<template>
    <div class="w-full px-4 py-2 hover:bg-gray-100 cursor-pointer" @click="$emit('clicked', paymentItem.id)">
        <p class="text-lg font-semibold">
            {{ paymentItem.title }}
        </p>
        <div class="w-full grid grid-cols-6" v-if="selectedItem === paymentItem.id">
            <p class="col-span-4 text-sm">
                {{ paymentItem.description }}
            </p>
            <div class="col-span-2 flex flex-col items-end text-xs">
                <p>£{{ paymentItem.amount }}</p>
                <p>{{ paymentItem.payment_date }}</p>
            </div>
        </div>
        <!--   description, amount, payment_date     -->
    </div>
</template>

<script>
export default {
    name: "PaymentItem",
    data() {
        return {}
    },
    props: {
        paymentItem: Object,
        selectedItem: Number
    }
}
</script>
