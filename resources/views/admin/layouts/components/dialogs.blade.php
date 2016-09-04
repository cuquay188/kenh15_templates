@include('admin.partials.create_article')
@include('admin.partials.create_tag')
@include('admin.partials.create_category')
@include('admin.partials.create_author')

@include("admin.articles.list.components.article")
@include("admin.articles.list.components.edit")
@include("admin.articles.list.components.delete.article")
@include("admin.articles.list.components.delete.author")
@include("admin.articles.list.components.delete.tag")

@include('admin.categories.list.components.delete')
@include('admin.categories.list.components.edit')

@include('admin.tags.list.components.edit')
@include('admin.tags.list.components.delete')

@include("admin.authors.list.components.edit")
@include("admin.authors.list.components.delete")