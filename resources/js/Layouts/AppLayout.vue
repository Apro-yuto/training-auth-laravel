<template>
    <div>
        <Head :title="title" />

        <jet-banner />

        <div class="layout">
            <nav class="layout_nav">
                <!-- Primary Navigation Menu -->
                <div class="layout_nav_wrapper">
                    <!-- Settings Dropdown -->
                    <a href="/" class="layout_nav_logo">
                        <img src="/img/book.png" alt="" class="w-10">
                        <span class="ml-6">manage Readingtime App</span>
                    </a>
                    <div class="layout_nav_right">
                        <jet-dropdown align="right" width="48">
                            <template #trigger>

                                <span class="layout_nav_item">
                                    <button type="button" class="layout_nav_btn">
                                        {{ $page.props.user.name }}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <!-- Account Management -->
                                <div class="layout_nav_setting">
                                    アカウント設定
                                </div>
                                <jet-dropdown-link :href="route('profile.show')">
                                    プロフィール
                                </jet-dropdown-link>
                                <div class="layout_separate"></div>
                                <!-- Authentication -->
                                <form @submit.prevent="logout">
                                    <jet-dropdown-link as="button">
                                        ログアウト
                                    </jet-dropdown-link>
                                </form>
                            </template>
                        </jet-dropdown>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="layout_humberger">
                    <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">

                    <!-- Responsive Settings Options -->
                    <div class="layout_option">
                        <div class="layout_option_account">
                            <div>
                                <div class="layout_option_account-name">{{ $page.props.user.name }}</div>
                                <div class="layout_option_account-email">{{ $page.props.user.email }}</div>
                            </div>
                        </div>
                        <div class="layout_option-content">
                            <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                                プロフィール
                            </jet-responsive-nav-link>
                            <form method="POST" @submit.prevent="logout">
                                <jet-responsive-nav-link as="button">
                                    ログアウト
                                </jet-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>

            <footer class="layout_footer">
                <div class="layout_footer-sns">
                    <a href="https://github.com/Apro-yuto">
                        Github
                    </a>
                    <a href="https://twitter.com/A_pro_yuto">
                        Twitter
                    </a>
                </div>
                <small class="layout_footer-copy">&copy; Yuto Nagashima</small>
            </footer>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue';
import JetBanner from '@/Jetstream/Banner.vue';
import JetDropdown from '@/Jetstream/Dropdown.vue';
import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
import JetNavLink from '@/Jetstream/NavLink.vue';
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    props: {
        title: String,
    },

    components: {
        Head,
        JetApplicationMark,
        JetBanner,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
        Link,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        };
    },

    methods: {
        switchToTeam(team) {
            this.$inertia.put(
                route('current-team.update'),
                {
                    team_id: team.id,
                },
                {
                    preserveState: false,
                },
            );
        },

        logout() {
            this.$inertia.post(route('logout'));
        },
    },
});
</script>
