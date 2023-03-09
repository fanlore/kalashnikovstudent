<template>
    <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600" v-if="editor">
      <div class="flex justify-between items-center py-2 px-3 border-b dark:border-gray-600">
        <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600">
          <div class="flex items-center space-x-1 sm:pr-4">
            <button title="Жирный" class="p-2 text-black rounded cursor-pointer hover:bg-black hover:text-white dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600" @click="editor.chain().focus().toggleBold().run()" :class="{ 'is-active': editor.isActive('bold') }">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="none" >
                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99998 10C12.294 10 14.1536 8.1345 14.1536 5.83333C14.1536 3.53214 12.294 1.66666 9.99998 1.66666H4.58331V10H9.99998Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6796 18.3333C13.9736 18.3333 15.8333 16.4678 15.8333 14.1667C15.8333 11.8655 13.9736 10 11.6796 10H4.58331V18.3333H11.6796Z" stroke="currentColor"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
            <button title="Курсив" class="p-2 text-black rounded cursor-pointer hover:bg-black hover:text-white dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600" @click="editor.chain().focus().toggleItalic().run()" :class="{ 'is-active': editor.isActive('italic') }">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="none">
                <path d="M8.33331 2.5H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5 17.5H11.6667" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.0834 2.48006L7.91669 17.4999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>

          </div>
          <div class="flex flex-wrap items-center space-x-1 sm:pl-4">
            <button title="Заголовок первого уровня" class="p-2 text-black rounded cursor-pointer hover:bg-black hover:text-white dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600" @click="editor.chain().focus().toggleHeading({ level: 1 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="none">
                <path d="M2.5 3.33333V16.6667" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.4167 3.33333V16.6667" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2.5 10H10.4167" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14.2609 10L16.25 7.92358V16.6667" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
            <button title="Добавить изображение по ссылке" class="p-2 text-black rounded cursor-pointer hover:bg-black hover:text-white dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"  @click="addImage" :class="{ 'is-active': editor.isActive('addImage') }">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="none">
                <path d="M4.16665 18.3333H15.8333C16.2936 18.3333 16.6666 17.9602 16.6666 17.5V5.83333H12.5V1.66666H4.16665C3.70641 1.66666 3.33331 2.03976 3.33331 2.5V17.5C3.33331 17.9602 3.70641 18.3333 4.16665 18.3333Z" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.5 1.66666L16.6667 5.83333" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M7.49998 8.75C8.42045 8.75 9.16665 8.00381 9.16665 7.08333C9.16665 6.16286 8.42045 5.41667 7.49998 5.41667C6.57951 5.41667 5.83331 6.16286 5.83331 7.08333C5.83331 8.00381 6.57951 8.75 7.49998 8.75Z" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6.25 11.6667V15.4167H13.75V8.75L9.78725 13.125L6.25 11.6667Z" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
            <button title="Добавить видео с ютуба" class="p-2 text-black rounded cursor-pointer hover:bg-black hover:text-white dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"  @click="addVideo" :class="{ 'is-active': editor.isActive('addImage') }">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="none">
                <path d="M4.60987 4.33933C6.91954 4.22421 8.71596 4.16666 9.99916 4.16666C11.2825 4.16666 13.0796 4.22425 15.3904 4.33937C16.6413 4.40171 17.653 5.37996 17.7573 6.628C17.863 7.89216 17.9158 9.00558 17.9158 9.96825C17.9158 10.9427 17.8617 12.0717 17.7534 13.3551C17.6494 14.5876 16.6597 15.5588 15.4254 15.6395C13.4498 15.7687 11.6411 15.8333 9.99916 15.8333C8.3575 15.8333 6.54942 15.7687 4.57492 15.6396C3.34105 15.5589 2.35154 14.5883 2.24703 13.3562C2.13736 12.0632 2.08252 10.9339 2.08252 9.96825C2.08252 9.01421 2.13604 7.90041 2.2431 6.62683H2.24311C2.34797 5.37929 3.35947 4.40166 4.60987 4.33933Z" stroke="currentColor" stroke-width="1.66667" stroke-linejoin="round"/>
                <path d="M8.75 8.1705V11.8358C8.75 12.0331 8.90992 12.193 9.10712 12.193C9.17717 12.193 9.24567 12.1724 9.30408 12.1338L12.0531 10.3169C12.2176 10.2081 12.2628 9.98654 12.1541 9.822C12.1281 9.78266 12.0945 9.74887 12.0554 9.72254L9.30642 7.87412C9.14275 7.76404 8.92083 7.80754 8.81075 7.97121C8.77117 8.03012 8.75 8.0995 8.75 8.1705Z" stroke="currentColor" stroke-width="1.66667" stroke-linejoin="round"/>
              </svg>
            </button>
            <button title="Цитата" class="p-2 text-black rounded cursor-pointer hover:bg-black hover:text-white dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"  @click="editor.chain().focus().toggleBlockquote().run()" :class="{ 'is-active': editor.isActive('blockquote') }">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.85554 3.79828C4.71779 5.81338 2.97464 8.15879 2.62607 10.8345C2.08342 15 5.8085 17.0388 7.69596 15.2069C9.58342 13.375 8.452 11.0498 7.08529 10.4142C5.71858 9.77859 4.88279 9.99996 5.02858 9.15058C5.17438 8.30125 7.11879 5.94634 8.82704 4.84963C8.94038 4.75325 8.9835 4.56625 8.87438 4.42438C8.80258 4.33108 8.66179 4.14811 8.452 3.87543C8.26854 3.63698 8.09279 3.64591 7.85554 3.79828Z" fill="currentColor"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1162 3.79828C12.9785 5.81338 11.2353 8.15879 10.8867 10.8345C10.3441 15 14.0692 17.0388 15.9567 15.2069C17.8441 13.375 16.7127 11.0498 15.346 10.4142C13.9793 9.77859 13.1435 9.99996 13.2893 9.15058C13.4351 8.30125 15.3795 5.94634 17.0877 4.84963C17.2011 4.75325 17.2442 4.56625 17.135 4.42438C17.0633 4.33108 16.9225 4.14811 16.7127 3.87543C16.5292 3.63698 16.3535 3.64591 16.1162 3.79828Z" fill="currentColor"/>
              </svg>
            </button>
            <button title="Блок кода" class="p-2 text-black rounded cursor-pointer hover:bg-black hover:text-white dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"  @click="editor.chain().focus().toggleCodeBlock().run()" :class="{ 'is-active': editor.isActive('codeBlock') }">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="none">
                <path d="M6.66669 5.41667L1.66669 10.5968L6.66669 15.4167" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.3333 5.41667L18.3333 10.5968L13.3333 15.4167" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.6667 1.66667L8.75 18.3333" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round"/>
              </svg>
            </button>
            <div class="hs-dropdown relative inline-flex">
              <button id="hs-dropdown-unstyled" type="button" class="p-2 hover:bg-black hover:text-white rounded hs-dropdown-toggle inline-flex justify-center items-center gap-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="none">
                  <path d="M17.5 2.5H2.50002C2.03978 2.5 1.66669 2.8731 1.66669 3.33333V16.6667C1.66669 17.1269 2.03978 17.5 2.50002 17.5H17.5C17.9603 17.5 18.3334 17.1269 18.3334 16.6667V3.33333C18.3334 2.8731 17.9603 2.5 17.5 2.5Z" stroke="currentColor" stroke-width="1.66667" stroke-linejoin="round"/>
                  <path d="M1.66669 7.5H18.3334" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M7.29169 7.5V17.5" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M12.7083 7.5V17.5" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M1.66669 12.5H18.3334" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M18.3334 3.33334V16.6667C18.3334 17.1269 17.9603 17.5 17.5 17.5H2.50002C2.03978 17.5 1.66669 17.1269 1.66669 16.6667V3.33334" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>

              <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-[15rem] bg-white shadow-md rounded flex flex-col" aria-labelledby="hs-dropdown-unstyled">
                <button @click="editor.chain().focus().insertTable({ rows: 3, cols: 3, withHeaderRow: true }).run()">
                  Вставить таблицу
                </button>
                <button @click="editor.chain().focus().addColumnBefore().run()" :disabled="!editor.can().addColumnBefore()">
                  Добавить столбец до
                </button>
                <button @click="editor.chain().focus().addColumnAfter().run()" :disabled="!editor.can().addColumnAfter()">
                  Добавить столбец после
                </button>
                <button @click="editor.chain().focus().deleteColumn().run()" :disabled="!editor.can().deleteColumn()">
                  Удалить столбец
                </button>
                <button @click="editor.chain().focus().addRowBefore().run()" :disabled="!editor.can().addRowBefore()">
                  Добавить строку до
                </button>
                <button @click="editor.chain().focus().addRowAfter().run()" :disabled="!editor.can().addRowAfter()">
                  Добавить строку после
                </button>
                <button @click="editor.chain().focus().deleteRow().run()" :disabled="!editor.can().deleteRow()">
                  Удалить строку
                </button>
                <button @click="editor.chain().focus().deleteTable().run()" :disabled="!editor.can().deleteTable()">
                  Удалить таблицу
                </button>
                <button @click="editor.chain().focus().mergeCells().run()" :disabled="!editor.can().mergeCells()">
                  Объединить ячейки
                </button>
<!--                <button @click="editor.chain().focus().splitCell().run()" :disabled="!editor.can().splitCell()">-->
<!--                  splitCell-->
<!--                </button>-->
                <button @click="editor.chain().focus().mergeOrSplit().run()" :disabled="!editor.can().mergeOrSplit()">
                  Объединить или слить ячейки
                </button>
                <button @click="editor.chain().focus().setCellAttribute('backgroundColor', '#FAF594').run()" :disabled="!editor.can().setCellAttribute('backgroundColor', '#FAF594')">
                  Установить фон
                </button>
<!--                <button @click="editor.chain().focus().fixTables().run()" :disabled="!editor.can().fixTables()">-->
<!--                  fixTables-->
<!--                </button>-->
                <button @click="editor.chain().focus().goToNextCell().run()" :disabled="!editor.can().goToNextCell()">
                  К следующей ячейке
                </button>
                <button @click="editor.chain().focus().goToPreviousCell().run()" :disabled="!editor.can().goToPreviousCell()">
                  К предыдущей ячейке
                </button>
              </div>
            </div>


          </div>
        </div>

      </div>
        <editor-content :editor="editor" class="py-2 px-4 bg-white rounded-b-lg dark:bg-gray-800"/>
    </div>

</template>

<script>
import { Editor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import Dropcursor from '@tiptap/extension-dropcursor'
import Image from '@tiptap/extension-image'
import Blockquote from '@tiptap/extension-blockquote'
import Youtube from '@tiptap/extension-youtube'
import Typography from '@tiptap/extension-typography'
import Table from '@tiptap/extension-table'
import TableCell from '@tiptap/extension-table-cell'
import TableHeader from '@tiptap/extension-table-header'
import TableRow from '@tiptap/extension-table-row'
import CodeBlockLowlight from '@tiptap/extension-code-block-lowlight'
import { lowlight } from 'lowlight'
import css from 'highlight.js/lib/languages/css'
import js from 'highlight.js/lib/languages/javascript'
import html from 'highlight.js/lib/languages/xml'
lowlight.registerLanguage('html', html)
lowlight.registerLanguage('css', css)
lowlight.registerLanguage('js', js)

const CustomTableCell = TableCell.extend({
  addAttributes() {
    return {
      // extend the existing attributes …
      ...this.parent?.(),

      // and add a new one …
      backgroundColor: {
        default: null,
        parseHTML: element => element.getAttribute('data-background-color'),
        renderHTML: attributes => {
          return {
            'data-background-color': attributes.backgroundColor,
            style: `background-color: ${attributes.backgroundColor}`,
          }
        },
      },
    }
  },
})
export default {
  components: {
    EditorContent,
  },

  data() {
    return {
      editor: null,
    }
  },
  props: {
    modelValue: {
      type: String,
      default: '',
    },
  },
  emits: ['update:modelValue'],
  watch: {
    modelValue(value) {
      // HTML
      const isSame = this.editor.getHTML() === value

      // JSON
      // const isSame = JSON.stringify(this.editor.getJSON()) === JSON.stringify(value)

      if (isSame) {
        return
      }

      this.editor.commands.setContent(value, false)
    },
  },
  methods:{
    addImage(){
      const url = window.prompt('URL')

      if (url) {
        this.editor.chain().focus().setImage({ src: url }).run()
      }
    },
    addVideo() {
      const url = prompt('Введите ссылку на видеоролик с YouTube')

      this.editor.commands.setYoutubeVideo({
        src: url,
        width: Math.max(320, parseInt(this.width, 10)) || 640,
        height: Math.max(180, parseInt(this.height, 10)) || 480,
      })
    },
  },

  mounted() {
    this.editor = new Editor({
      content: this.modelValue,
      extensions: [
        StarterKit,
        Image,
        Dropcursor,
        Blockquote,
        Youtube.configure({
          controls: false,
        }),
        Typography.configure({
          oneHalf: false,
          oneQuarter: false,
          threeQuarters: false,
        }),
        Table.configure({
          resizable: true,
        }),
        TableRow,
        TableHeader,
        CustomTableCell,
        CodeBlockLowlight.configure({
          lowlight,
        }),
      ],
      onUpdate: () => {
        // HTML
        this.$emit('update:modelValue', this.editor.getHTML())

        // JSON
        // this.$emit('update:modelValue', this.editor.getJSON())
      },
    })
  },

  beforeUnmount() {
    this.editor.destroy()
  },
}
</script>
<style scoped>
  .is-active {
    background: black;
    color: white;
    transition: 1s ease all;
  }
  button:disabled {
    background: #718096;
    color: white;
  }
</style>
