<template>
    <div class="w-full px-8">
        <payment-search @search="searchPayments"/>
        <div class="w-full flex flex-wrap pb-8 mt-2">
            <payment-item
                v-for="item in payments"
                :payment-item="item"
                :key="item.id"
                :selected-item="selectedItem"
                @clicked="selectedItem = item.id"
            />
        </div>
        <pagination
            v-if="totalPages > 1"
            :current-page="currentPage"
            :total-pages="totalPages"
            :max-pages="6"
            @paginationButtonClicked="paginationClicked"
        />
    </div>
</template>

<script>
import {api} from "../utils/api";
import PaymentItem from "./PaymentItem";
import Pagination from "./Pagination";
import PaymentSearch from "./PaymentSearch";

export default {
    name: "PaymentList",
    components: {
        Pagination,
        PaymentItem,
        PaymentSearch
    },
    data() {
        return {
            payments: [],
            selectedItem: 0,
            totalPages: 0,
            currentPage: 1,
            totalPayments: 0,
            searchText: ''
        }
    },
    mounted() {
        this.getPayments()
    },
    methods: {
        getPayments(params = {page: this.currentPage, text: this.searchText}) {
            this.selectedItem = 0
            api.get('payments', params)
                .then((data) => {
                    this.payments = data.data
                    this.totalPages = data.meta.last_page
                    this.currentPage = data.meta.current_page
                    this.totalPayments = data.meta.total
                })
        },
        paginationClicked(page) {
            this.currentPage = page
            this.getPayments()
        },
        searchPayments(searchText) {
            this.currentPage = 1;
            if (this.searchText === searchText) {
                return
            }
            this.searchText = searchText
            this.getPayments({page: this.currentPage, text: searchText})
        },
    }
}
</script>
