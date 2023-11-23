set nocompatible	" required
set encoding=utf-8
filetype off		" required

set rtp+=~/.vim/bundle/Vundle.vim
call vundle#begin()
"call vundle#begin('~/some/path/here')

Plugin 'gmarik/Vundle.vim'
Plugin 'tmhedberg/SimpylFold'
Plugin 'vim-scripts/indentpython.vim'
Plugin 'vim-syntastic/syntastic'
Plugin 'nvie/vim-flake8'
Plugin 'jnurmine/Zenburn'
"Plugin 'scrooloose/nerdtree'
Plugin 'jistr/vim-nerdtree-tabs'
Plugin 'kien/ctrlp.vim'
Plugin 'tpope/vim-fugitive'
Plugin 'Lokaltog/powerline', {'rtp': 'powerline/bindings/vim/'}

"Bundle 'Valloric/YouCompleteMe'
" Rails
Bundle 'tpope/vim-rails.git'
Bundle 'tomasr/molokai'
Bundle 'vim-ruby/vim-ruby'
Bundle 'tpope/vim-surround'
Bundle 'jiangmiao/auto-pairs'
Bundle 'christoomey/vim-tmux-navigator'

call vundle#end()		" required
filetype plugin indent on	"required

syntax enable

"set background=light
"let g:molokai_original=1
"let g:rehash256=1
"set t_Co=256
"colorscheme molokai
" Show trailing whitespace and spaces before a tab:
:highlight ExtraWhitespace ctermbg=red guibg=red
:autocmd Syntax * syn match ExtraWhitespace /\s\+$\| \+\ze\\t/

" Tab completion
set wildcharm=<tab>
set wildmode=list:longest,list:full
set wildignore+=*.o,*.obj,.git,*.rbc,*.class,.svn,vendor/gems/*

" Avoid using arrow
"inoremap  <Up>     <NOP>
"inoremap  <Down>   <NOP>
"inoremap  <Left>   <NOP>
"inoremap  <Right>  <NOP>
"noremap   <Up>     <NOP>
"noremap   <Down>   <NOP>
"noremap   <Left>   <NOP>
"noremap   <Right>  <NOP>

" highlight the current line
"set cursorline
" Highlight active column
" set cuc cul

set splitbelow
set splitright
set expandtab
set smarttab
set shiftwidth=2
set tabstop=2
set softtabstop=2

set ai
set si


"split navigation
nnoremap <C-J> <C-W><C-J>
nnoremap <C-K> <C-W><C-K>
nnoremap <C-L> <C-W><C-L>
nnoremap <C-H> <C-W><C-H>
nmap <F6> :NERDTreeToggle<CR>

nnoremap <space> za

au FileType php setl ofu=phpcomplete#CompletePHP
au FileType ruby,eruby setl ofu=rubycomplete#Complete
au FileType html,xhtml setl ofu=htmlcomplete#CompleteTags
au FileType css setl ofu=csscomplete#CompleteCSS
au FileType python setl ofu=pythoncomplete#Complete

autocmd BufWritePre * :%s/\s\+$//e

au BufNewFile, BufRead *.py
    \ set tabstop=4
    \ set softtabstop=4
    \ set shiftwidth=4
    \ set textwidth=79
    \ set expandtab
    \ set autoindent
    \ set fileformat=unix

au BufNewFile, BufRead *.js, *html, *.css
    \ set tabstop=2
    \ set softtabstop=2
    \ set shiftwidth=2


au BufNewFile, BufRead *.erb, *.html.erb
    \ set tabstop=2
    \ set softtabstop=2
    \ set shiftwidth=2

"let g:ycm_autoclose_preview_window_after_completion=1
"map <leader>g  :YcmCompleter GoToDefinitionElseDeclaration<CR>

let python_highlight_all=1
syntax on

" Hide pyc file
let NERDTreeIgnore=['\.pyc$', '\~$'] "ignore files in NERDTree
set nu
set clipboard=unnamed

set clipboard^=unnamed,unnamedplus  " Share clipboard between Vim and OS, across platform"

