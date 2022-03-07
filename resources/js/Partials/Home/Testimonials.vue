<template>
    <section class="py-12 overflow-hidden md:py-20 lg:py-24">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="relative">
                <blockquote class="mt-10" v-for="testimonial in testimonials" :key="testimonial.name">
                    <div class="max-w-3xl mx-auto text-center text-2xl leading-9 font-medium text-gray-900">
                        <p>&ldquo;{{ testimonial.statement }}&rdquo;</p>
                    </div>
                    <footer class="mt-8">
                        <div class="md:flex md:items-center md:justify-center">
                            <div class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
                                <div class="text-base font-medium text-gray-900">{{ testimonial.name }}</div>

                                <svg class="hidden md:block mx-1 h-5 w-5 text-brand-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M11 0h3L9 20H6l5-20z" />
                                </svg>

                                <div class="text-base font-medium text-gray-500">{{ testimonial.role }}</div>
                            </div>
                        </div>
                    </footer>
                </blockquote>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Testimonials",
    data() {
        return {
            testimonials : [
                {
                    name: "Judith Black",
                    statement: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.",
                    role: "CEO, Workcation"
                }
            ]
        }
    }
}
</script>
