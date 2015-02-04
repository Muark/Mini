<div class="container">
    <h2>You are in the View: application/view/blog/index.php (everything in this box comes from that file)</h2>
    <!-- add song form -->
    <div class="box">
        <h3>Add a song</h3>
        <form action="<?php echo URL; ?>blog/addsong" method="POST">
            <label>Author</label>
            <input type="text" name="author" value="" required />
            <label>Title</label>
            <input type="text" name="title" value="" required />
            <label>Content</label>
            <input type="text" name="content" value="" />
            <input type="submit" name="submit_add_blog" value="Submit" />
        </form>
    </div>
    <!-- main content output -->
    <div class="box">
        <h3>Amount of blogs (data from second model)</h3>
        <div>
            <?php echo $this->blogs; ?>
        </div>
        <h3>Amount of blogs (via AJAX)</h3>
        <div>
            <button id="javascript-ajax-button">Click here to get the amount of blogs via Ajax (will be displayed in #javascript-ajax-result-box)</button>
            <div id="javascript-ajax-result-box"></div>
        </div>
        <h3>List of blogs (data from first model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Author</td>
                <td>Title</td>
                <td>Content</td>
                <td>Delete</td>
                <td>Edit</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($this->blogs as $blog) { ?>
                <tr>
                    <td><?php if (isset($blog->author)) echo htmlspecialchars($blog->author, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($blog->title)) echo htmlspecialchars($blog->title, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($blog->content)) echo htmlspecialchars($blog->content, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'blog/deleteblog/' . htmlspecialchars($blog->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'blog/editblog/' . htmlspecialchars($blog->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
