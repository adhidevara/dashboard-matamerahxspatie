<template>
    <tile :position="position" class="moota-mode">
        <div class="grid gap-2 items-center w-full bg-tile z-10" style="grid-template-columns: auto 1fr">
            <div>
                <Avatar :src="avatar" />
            </div>
            <div class="leading-tight min-w-0">
                <h2 class="truncate capitalize">
                      <span class="text-xl">Moota</span>
                </h2>
            </div>
        </div>
        <div class="grid gap-padding h-full markup">
            <ul class="bg-red-700 align-self-center">
                <li>
                    <span>Total User</span>
                    <span class="font-bold variant-tabular">{{ formatNumber(totalUSer) }}</span>
                </li>
                <li>
                    <span>User This Month</span>
                    <span class="font-bold variant-tabular">{{ formatNumber(userThisMonth) }}</span>
                </li>
                <li>
                    <span>User Active</span> <span class="font-bold variant-tabular">{{ formatNumber(userActive) }}</span>
                </li>
                <li>
                    <span>Total Bank Account</span>
                    <span class="font-bold variant-tabular">{{ formatNumber(totalBankAccount) }}</span>
                </li>
                <li>
                    <span>Bank Account This Month</span>
                    <span class="font-bold variant-tabular">{{ formatNumber(bankAccountThisMonth) }}</span>
                </li>
                <li>
                    <span>Total Account Deleted</span> <span class="font-bold variant-tabular">{{ formatNumber(totalAccountBankDeleted) }}</span>
                </li>
            </ul>
        </div>
    </tile>
</template>

<script>
import { emoji, formatNumber } from '../helpers';
import echo from '../mixins/echo';
import Avatar from './atoms/Avatar';
import Tile from './atoms/Tile';
import saveState from 'vue-save-state';

export default {
    components: {
        Tile,
        Avatar
    },

    mixins: [echo, saveState],

    props: ['position', 'avatar'],

    data() {
        return {
            // githubStars: 0,
            // githubIssues: 0,
            // githubPullRequests: 0,
            // githubContributors: 0,
            // packagistTotal: 0,
            // packagistMonthly: 0,

            totalUSer: 0,
            userThisMonth: 0,
            userActive: 0,
            totalBankAccount: 0,
            bankAccountThisMonth: 0,
            totalAccountBankDeleted: 0,
        };
    },

    methods: {
        emoji,
        formatNumber,

        getEventHandlers() {
            return {
                'Moota.StatsFetched': response => {
                    this.totalUSer = response.stats.total_user;
                    this.userThisMonth = response.stats.user_this_month;
                    this.userActive = response.stats.user_active;
                    this.totalBankAccount = response.stats.total_bank_account;
                    this.bankAccountThisMonth = response.stats.bank_account_this_month;
                    this.totalAccountBankDeleted = response.stats.total_account_deleted;
                }
            };
        },

        getSaveStateConfig() {
            return {
                cacheKey: 'statistics',
            };
        },
    },
};
</script>
