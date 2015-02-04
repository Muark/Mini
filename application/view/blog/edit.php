<div class="container">
    <h2>You are in the View: application/view/blog/edit.php (everything in this box comes from that file)</h2>
    <!-- add song form -->
    <div>
        <h3>Edit a blog</h3>
        <form action="<?php echo URL; ?>blog/updatesong" method="POST">
            <label>Author</label>
            <input autofocus type="text" name="author" value="<?php echo htmlspecialchars($this->blog->author, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Title</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($this->blog->title, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Content</label>
            <input type="text" name="content" value="<?php echo htmlspecialchars($this->blog->content, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="hidden" name="blog_id" value="<?php echo htmlspecialchars($this->blog->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_blog" value="Update" />
        </form>
    </div>
</div>

