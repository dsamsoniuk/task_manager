<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <!-- Element z tłami wymagany na potrzeby stałego generowania tła na potrzeby dynamiczne, PurgeCss usuwa nieuzywane klasy -->
        <div class="bg-blue-200 bg-red-200 bg-green-200 bg-orange-200 bg-red-200 bg-white-200"></div>

        <slot />
    </AppLayout>
</template>
