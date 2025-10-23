<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { BookOpen, Folder, LayoutGrid, LayoutList } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';
import users from '@/routes/dashboard/users';
import projects from '@/routes/dashboard/projects';
import { usePage } from '@inertiajs/vue3'
import notes from '@/routes/dashboard/notes';
import projectNotes from '@/routes/project-notes';
import SidebarGroupLabel from './ui/sidebar/SidebarGroupLabel.vue';

const page = usePage()
const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    }, {
        title: 'Users',
        href: users.index(),
        icon: LayoutGrid,
    },{
        title: 'Projects',
        href: projects.index(),
        icon: LayoutGrid,
    },{
        title: 'Notes',
        href: notes.index(),
        icon: LayoutGrid,
    }
];

const mainNavProjectsItems: NavItem[] = []
const projectList = page.props.projectList ?? null
if (projectList) {
    for (let p in projectList) {
        const pro = projectList[p]
        mainNavProjectsItems.push({
            title: pro.name,
            href: projectNotes.showNotes(pro.id),
            icon: Folder,
        })
    }
}

const footerNavItems: NavItem[] = [
    {
        title: 'Github Repo',
        href: 'https://github.com/laravel/vue-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits#vue',
        icon: BookOpen,
    },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="dashboard()">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <SidebarGroupLabel>Menu</SidebarGroupLabel>
            <NavMain :items="mainNavItems" />
            <SidebarGroupLabel>Projekty</SidebarGroupLabel>
            <NavMain :items="mainNavProjectsItems" />
        </SidebarContent>

        <SidebarFooter>
            <SidebarGroupLabel>Footer</SidebarGroupLabel>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
