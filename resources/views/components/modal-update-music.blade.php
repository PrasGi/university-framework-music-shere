<!-- Modal -->
<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="update-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Update music</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="upload-form" action="{{ route('music.update') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="update-id" name="music_id">
                    <div class="mb-3">
                        <label for="music" class="form-label">Music</label>
                        <input type="file" class="form-control" id="music" name="file_music">
                    </div>
                    <div class="mb-3">
                        <label for="music" class="form-label">Thumbnail</label>
                        <input type="file" class="form-control" id="music" name="file_thumbnail">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title*</label>
                        <input id="update-title" type="text" class="form-control" id="title" required
                            name="title">
                    </div>
                    <div class="mb-3">
                        <label for="artist" class="form-label">Artist*</label>
                        <input id="update-artist" type="text" class="form-control" id="artist" required
                            name="artist">
                    </div>
                    <div class="mb-3">
                        <label for="lyrics" class="form-label">Lyrics</label>
                        <textarea id="update-lyrics" class="form-control" id="lyrics" name="lyrics"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-upload"></i> Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
