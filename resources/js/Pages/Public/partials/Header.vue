<template>
    <header :class="{ 'bg-white blur shadow-lg': !top }" class="fixed w-full z-30 md:bg-opacity-90 transition duration-300 ease-in-out">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-16 md:h-20">

                <!-- Site branding -->
                <div class="flex-shrink-0 mr-2">
                    <!-- Logo -->
                    <inertia-link aria-label="FCG Villach" href="/">
                        <Logo class="h-12 text-center md:h-16"/>
                    </inertia-link>
                </div>

                <!-- Desktop navigation -->
                <nav class="hidden md:flex md:flex-grow">

                    <!-- Desktop menu links -->
                    <ul class="flex flex-grow justify-end flex-wrap items-center">
                        <Dropdown :to="route('public.about')" title="Über uns">
                            <li>
                                <inertia-link :href="route('public.about') + '#was-wir-glauben'" class="font-medium text-sm text-gray-600 hover:text-gray-900 flex py-2 px-5 leading-tight">Was wir
                                    glauben</inertia-link>
                            </li>
                            <li>
                                <inertia-link :href="route('public.about') + '#freie-christengemeinde'" class="font-medium text-sm text-gray-600 hover:text-gray-900 flex py-2 px-5 leading-tight">Freie Christengemeinde
                                </inertia-link>
                            </li>
                            <li>
                                <inertia-link :href="route('public.about') + '#was-ist-eine-freikirche'"
                                              class="font-medium text-sm text-gray-600 hover:text-gray-900 flex py-2 px-5 leading-tight">Was ist eine Freikirche
                                </inertia-link>
                            </li>
                            <li>
                                <inertia-link :href="route('public.about') + '#geschichte-der-fcg'"
                                              class="font-medium text-sm text-gray-600 hover:text-gray-900 flex py-2 px-5 leading-tight">Geschichte der
                                    FCG</inertia-link>
                            </li>
                        </Dropdown>
                        <li>
                            <inertia-link :href="route('public.events')"
                                          class="text-gray-600 hover:text-gray-900 px-3 lg:px-5 py-2 flex items-center transition duration-150 ease-in-out">Veranstaltungen
                            </inertia-link>
                        </li>

                        <li>
                            <inertia-link :href="route('public.blog')" class="text-gray-600 hover:text-gray-900 px-3 lg:px-5 py-2 flex items-center transition duration-150 ease-in-out">Predigten
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link :href="route('public.contact')" class="text-gray-600 hover:text-gray-900 px-3 lg:px-5 py-2 flex items-center transition duration-150 ease-in-out">Kontakt
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link :href="route('public.donate')" class="text-gray-600 hover:text-gray-900 px-3 lg:px-5 py-2 flex items-center transition duration-150 ease-in-out">Spenden
                            </inertia-link>
                        </li>
                    </ul>

                    <!-- Desktop sign in links -->
<!--                    <ul class="flex flex-grow justify-end flex-wrap items-center">
                        <li>
                            <inertia-link :href="route('public.signin')" class="font-medium text-gray-600 hover:text-gray-900 px-5 py-3 flex items-center transition duration-150 ease-in-out">Sign in
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link :href="route('public.signup')" class="btn-sm text-gray-200 bg-gray-900 hover:bg-gray-800 ml-3">
                                <span>Sign up</span>
                                <svg class="w-3 h-3 fill-current text-gray-400 flex-shrink-0 ml-2 -mr-1" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z" fill-rule="nonzero"/>
                                </svg>
                            </inertia-link>
                        </li>
                    </ul>-->

                </nav>

                <!-- Mobile menu -->
                <div class="flex md:hidden">

                    <!-- Hamburger button -->
                    <button ref="hamburger" :aria-expanded="mobileNavOpen" :class="{ active: mobileNavOpen }" aria-controls="mobile-nav" class="hamburger" @click="mobileNavOpen = !mobileNavOpen">
                        <span class="sr-only">Menu</span>
                        <svg class="w-6 h-6 fill-current text-gray-900" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <rect height="2" width="24" y="4"/>
                            <rect height="2" width="24" y="11"/>
                            <rect height="2" width="24" y="18"/>
                        </svg>
                    </button>

                    <!-- Mobile navigation -->
                    <transition
                        enter-active-class="transition ease-out duration-200 transform"
                        enter-class="opacity-0 -translate-y-2"
                        enter-to-class="opacity-100 translate-y-0"
                        leave-active-class="transition ease-out duration-200"
                        leave-class="opacity-100"
                        leave-to-class="opacity-0"
                    >
                        <nav
                            v-show="mobileNavOpen"
                            id="mobile-nav"
                            ref="mobileNav"
                            class="absolute top-full h-screen pb-16 z-20 left-0 w-full overflow-scroll bg-white transition-all duration-300 ease-in-out"
                        >
                            <ul class="px-5 py-2">
                                <li class="py-2 my-2 border-t border-b border-gray-200">
                                    <span class="flex text-gray-600 hover:text-gray-900 py-2">Über uns</span>
                                    <ul class="pl-4">
                                        <li>
                                            <inertia-link :href="route('public.about')" class="text-sm flex font-medium text-gray-600 hover:text-gray-900 py-2">Was wir glauben</inertia-link>
                                        </li>
                                        <li>
                                            <inertia-link :href="route('public.about')" class="text-sm flex font-medium text-gray-600 hover:text-gray-900 py-2">Freie Christengemeinde</inertia-link>
                                        </li>
                                        <li>
                                            <inertia-link :href="route('public.about')" class="text-sm flex font-medium text-gray-600 hover:text-gray-900 py-2">Was ist eine Freikirche</inertia-link>
                                        </li>
                                        <li>
                                            <inertia-link :href="route('public.about')" class="text-sm flex font-medium text-gray-600 hover:text-gray-900 py-2">Geschichte der FCG</inertia-link>
                                        </li>
                                    </ul>
                                </li>


                                <li>
                                    <inertia-link :href="route('public.events')" class="flex text-gray-600 hover:text-gray-900 py-2">Veranstaltungen</inertia-link>
                                </li>
                                <li>
                                    <inertia-link :href="route('public.blog')" class="flex text-gray-600 hover:text-gray-900 py-2">Predigten</inertia-link>
                                </li>
                                <li>
                                    <inertia-link :href="route('public.donate')" class="flex text-gray-600 hover:text-gray-900 py-2">Spenden</inertia-link>
                                </li>
                                <li>
                                    <inertia-link :href="route('public.contact')" class="btn-sm text-gray-200 bg-gray-900 hover:bg-gray-800 w-full my-2">
                                        <span>Kontakt</span>
                                        <svg class="w-3 h-3 fill-current text-gray-400 flex-shrink-0 ml-2 -mr-1" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z" fill="#999" fill-rule="nonzero"/>
                                        </svg>
                                    </inertia-link>
                                </li>
                            </ul>
                        </nav>
                    </transition>

                </div>

            </div>
        </div>
    </header>
</template>

<script>
import Dropdown from './../utils/Dropdown'
import Logo from './Logo'

export default {
    name: 'Header',
    components: {
        Dropdown,
        Logo
    },
    data: function () {
        return {
            mobileNavOpen: false,
            top: true
        }
    },
    methods: {
        clickOutside(e) {
            if (!this.mobileNavOpen || this.$refs.mobileNav.contains(e.target) || this.$refs.hamburger.contains(e.target)) return
            this.mobileNavOpen = false
        },
        keyPress() {
            if (!this.mobileNavOpen || event.keyCode !== 27) return
            this.mobileNavOpen = false
        },
        handleScroll() {
            this.top = window.pageYOffset > 10 ? false : true
        }
    },
    mounted() {
        document.addEventListener('click', this.clickOutside)
        document.addEventListener('keydown', this.keyPress)
        document.addEventListener('scroll', this.handleScroll)
    },
    beforeUnmount() {
        document.removeEventListener('click', this.clickOutside)
        document.removeEventListener('keydown', this.keyPress)
        document.removeEventListener('scroll', this.handleScroll)
    }
}
</script>
