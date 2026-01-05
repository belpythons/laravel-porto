<div x-data="{
    isOpen: false,
    draft: {
        accent: '',
        bgTone: '',
        fontType: 'sans',
        fontFamily: 'Instrument Sans'
    },
    fontOptions: {
        'sans': ['Instrument Sans', 'Inter', 'Roboto', 'Poppins', 'Lato', 'Montserrat', 'Open Sans', 'Nunito', 'JetBrains Mono'],
        'serif': ['Playfair Display', 'Merriweather', 'Lora']
    },
    initBuilder() {
        // Load settings from global config
        const current = window.getThemeBuilderConfig ? window.getThemeBuilderConfig() : {};
        this.draft = { ...this.draft, ...current };
    },
    openPanel() {
        this.initBuilder();
        this.isOpen = true;
    },
    closePanel() {
        this.isOpen = false;
    },
    apply() {
        if (window.applyThemeBuilderConfig) {
            window.applyThemeBuilderConfig(this.draft);
            this.isOpen = false; 
        } else {
            console.error('Theme Builder not initialized');
        }
    },
    reset() {
        if (window.resetThemeBuilderConfig) {
            window.resetThemeBuilderConfig();
        }
    }
}" x-init="initBuilder()" class="fixed bottom-6 right-6 z-50 font-sans flex flex-col items-end">

    {{-- Trigger Button (Visible when closed) --}}
    <button x-show="!isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="scale-0 opacity-0" x-transition:enter-end="scale-100 opacity-100" @click="openPanel()"
        class="h-14 w-14 rounded-full bg-slate-900 dark:bg-white text-white dark:text-slate-900 shadow-2xl flex items-center justify-center hover:scale-110 transition-transform cursor-pointer border-2 border-white dark:border-slate-800"
        title="Customize Theme">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="3" />
            <path
                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1Z" />
        </svg>
    </button>

    {{-- Expanded Panel --}}
    {{-- Expanded Panel --}}
    <div x-show="isOpen" x-cloak x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-8 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-8 scale-95"
        class="w-80 bg-white/95 dark:bg-slate-900/95 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl shadow-2xl overflow-hidden flex flex-col">

        {{-- Header --}}
        <div
            class="px-5 py-4 border-b border-slate-200 dark:border-slate-800 flex justify-between items-center bg-slate-50/50 dark:bg-slate-800/50">
            <h3 class="font-bold text-slate-900 dark:text-white text-sm uppercase tracking-wide">Theme Settings</h3>
            <button @click="closePanel()"
                class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>

        <div class="p-5 space-y-6 overflow-y-auto max-h-[70vh]">

            {{-- Resume Section --}}
            <div class="space-y-3">
                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider block">Resume</label>
                <a href="{{ route('resume.download') }}"
                    class="flex items-center justify-center gap-2 w-full py-2.5 bg-slate-900 dark:bg-white text-white dark:text-slate-900 rounded-lg font-bold text-sm hover:opacity-90 transition-opacity shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                        <polyline points="7 10 12 15 17 10" />
                        <line x1="12" y1="15" x2="12" y2="3" />
                    </svg>
                    Download ATS CV
                </a>
            </div>

            <hr class="border-slate-200 dark:border-slate-800" />

            {{-- Appearance Section --}}
            <div class="space-y-5">
                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider block">Appearance</label>

                {{-- Colors --}}
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-[11px] text-slate-500 font-medium">Accent</label>
                        <div
                            class="flex items-center gap-2 bg-slate-100 dark:bg-slate-800 p-1.5 rounded-lg border border-slate-200 dark:border-slate-700">
                            <input type="color" x-model="draft.accent"
                                class="h-6 w-8 rounded cursor-pointer border-0 p-0 bg-transparent" />
                            <span class="text-[10px] font-mono text-slate-600 dark:text-slate-300 w-full truncate"
                                x-text="draft.accent || 'Default'"></span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] text-slate-500 font-medium">Background</label>
                        <div
                            class="flex items-center gap-2 bg-slate-100 dark:bg-slate-800 p-1.5 rounded-lg border border-slate-200 dark:border-slate-700">
                            <input type="color" x-model="draft.bgTone"
                                class="h-6 w-8 rounded cursor-pointer border-0 p-0 bg-transparent" />
                            <span class="text-[10px] font-mono text-slate-600 dark:text-slate-300 w-full truncate"
                                x-text="draft.bgTone || 'Default'"></span>
                        </div>
                    </div>
                </div>

                {{-- Typography --}}
                <div class="space-y-3">
                    <label class="text-[11px] text-slate-500 font-medium">Typography</label>

                    {{-- Font Type Toggle --}}
                    <div
                        class="flex bg-slate-100 dark:bg-slate-800 rounded-lg p-1 border border-slate-200 dark:border-slate-700">
                        <button @click="draft.fontType = 'sans'"
                            :class="draft.fontType === 'sans' ? 'bg-white dark:bg-slate-600 shadow-sm text-slate-900 dark:text-white' : 'text-slate-500 hover:text-slate-700 dark:hover:text-slate-300'"
                            class="flex-1 py-1.5 text-xs font-medium rounded-md transition-all">
                            Sans
                        </button>
                        <button @click="draft.fontType = 'serif'"
                            :class="draft.fontType === 'serif' ? 'bg-white dark:bg-slate-600 shadow-sm text-slate-900 dark:text-white' : 'text-slate-500 hover:text-slate-700 dark:hover:text-slate-300'"
                            class="flex-1 py-1.5 text-xs font-serif rounded-md transition-all">
                            Serif
                        </button>
                    </div>

                    {{-- Font Family Select --}}
                    <div class="relative">
                        <select x-model="draft.fontFamily"
                            class="w-full text-xs p-2 rounded-lg bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-900 dark:focus:ring-white outline-none">
                            <option value="">Default (Instrument Sans)</option>
                            <template x-for="font in fontOptions[draft.fontType]" :key="font">
                                <option :value="font" x-text="font"></option>
                            </template>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button @click="reset()"
                    class="flex-1 py-2 text-xs font-bold text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors">
                    Reset
                </button>
                <button @click="apply()"
                    class="flex-[2] py-2 bg-slate-900 dark:bg-white text-white dark:text-slate-900 rounded-lg text-xs font-bold hover:opacity-90 transition-opacity shadow-lg">
                    Apply Changes
                </button>
            </div>

        </div>
    </div>
</div>