<template>
    <section>
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="py-12 md:py-20 border-t border-gray-200">
                <!-- Section header -->
                <div class="max-w-3xl mx-auto text-center pb-12 md:pb-16">
                    <h1 class="h2 mb-4">
                        Wir sind nicht nur eine Kirche <br/>Wir sind Gemeinschaft
                    </h1>
                    <p class="text-xl text-gray-600">
                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur excepteur sint occaecat
                        cupidatat.
                    </p>
                </div>

                <!-- Items -->
                <div
                    class="max-w-sm mx-auto grid gap-8 md:gap-16 md:grid-cols-2 lg:grid-cols-3 items-start md:max-w-2xl lg:max-w-5xl pt-8 md:pt-10"
                >
                    <!-- 1st item -->
                    <div class="text-center">
                        <div class="h3 mb-1">Gottesdienst</div>
                        <div class="text-gray-600">
                            Lorem ipsum is placeholder text commonly used tristique senectus
                            et.
                        </div>
                    </div>

                    <!-- 2nd item -->
                    <div class="text-center">
                        <div class="h3 mb-1">Gemeindegebet</div>
                        <div class="text-gray-600">
                            Lorem ipsum is placeholder text commonly used tristique senectus
                            et.
                        </div>
                    </div>

                    <!-- 3rd item -->
                    <div class="text-center">
                        <div class="h3 mb-1">Hefel Café</div>
                        <div class="text-gray-600">
                            Lorem ipsum is placeholder text commonly used tristique senectus
                            et.
                        </div>
                    </div>
                </div>

                <div class="text-center my-16">
                    <a
                        class="btn text-white bg-brand-primary hover:bg-brand-primary-light w-full mb-4 sm:w-auto sm:mb-0"
                        href="#0"
                    >Alle Veranstaltungen ansehen</a
                    >
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: "EventsHome",
};
</script>
