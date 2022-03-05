<template>
    <div class="max-w-xl w-full mx-auto flex justify-center items-center mt-12 p-8 bg-gray-200 rounded shadow-md">
        <payment-list />
    </div>
</template>
<style>

</style>
<script>
    import PaymentList from "./PaymentList";

    export default {
        components: {
            PaymentList
        }
    }
</script>
