<div>
    <!-- wire:submit.prevent提交地址 -->
    <form wire:submit.prevent="createLeaveMsg">
        <div class="form-group">
            <label for="content">標題</label>
            <!-- 数据双向绑定 -->
            <input wire:model.lazy="title" id="title" >

        </div>
        <div class="form-group">
            <label for="content">留言</label>
            <!-- 数据双向绑定 -->
            <textarea wire:model.lazy="content" id="content" class="@error('content') is-invalid @enderror" rows="3"></textarea>
        </div>

        @error('content')
        <ul class="invalid-feedback" style="color: #721c24">
            <li>{{ $message }}</li>
        </ul>
    @enderror
        <!-- 点击发布后提交到createLeaveMsg方法 -->
        <button type="submit" class="btn btn-sm btn-primary">发布留言</button>
    </form>
</div>
