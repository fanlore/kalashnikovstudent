import { ref, computed } from 'vue'

export const collapsed = ref(true);
export const translatePos = ref(true);

export const toggleSidebar = () => (collapsed.value = !collapsed.value)
export const toggleSidebarMobile = () => {
  translatePos.value = !translatePos.value
}
export const SIDEBAR_WIDTH = 256;
export const SIDEBAR_WIDTH_COLLAPSED = 100;
export const SIDEBAR_TRANSLATE_COLLAPSED = -120;
export const SIDEBAR_TRANSLATE = 0;

export const sidebarWidth = computed(() => `${collapsed.value ? SIDEBAR_WIDTH_COLLAPSED : SIDEBAR_WIDTH}px`);
export const sidebarTranslate = computed(() => `${translatePos.value ? SIDEBAR_TRANSLATE_COLLAPSED : SIDEBAR_TRANSLATE}px`);
