<form id="build-menu" action="{{ route('app.menu.update', $menu) }}" method="post">
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}
    <input type="hidden" name="menu-list">
    <input type="hidden" name="content[modified_by]" value="{{Auth::id()}}">
    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                @foreach($langs as $lang)
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="title-{{ $lang->slug }}">[{{ $lang->slug }}] Заголовок меню</label>
                            @if(!empty($contentLang = $menu->contents()->where('lang_id', $lang->id)->first()))
                                <input type="hidden" name="contentLang[{{ $lang->locale }}][id]" value="{{$contentLang->id}}">
                            @endif
                            <input type="text" id="title-{{ $lang->slug }}" class="form-control item-menu" name="contentLang[{{ $lang->locale }}][title]" placeholder="[{{ $lang->slug }}] Заголовок меню" value="{{ $contentLang->title or '' }}">
                            <input type="hidden" name="contentLang[{{ $lang->locale }}][lang_id]" value="{{ $lang->id }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group pull-right">
                <label style="display: block;">Статус</label>
                <div class="btn-group btn-group-toggle published-toggle" data-toggle="buttons">
                    <label class="btn @if($menu->published == 1) btn-success active @else btn-default @endif">
                        <input type="radio" name="content[published]" value="1" @if($menu->published == 1) checked @endif><i class="fa fa-check" aria-hidden="true"></i> Опубликовано
                    </label>
                    <label class="btn @if($menu->published == 0) btn-danger active @else btn-default @endif">
                        <input type="radio" name="content[published]" value="0" @if($menu->published == 0) checked @endif><i class="fa fa-times" aria-hidden="true"></i> Не опубликовано
                    </label>
                </div>
            </div>
        </div>
    </div>
</form>