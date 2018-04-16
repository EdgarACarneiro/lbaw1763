<a class="card my-3 question-card" href="question.html">
    <div class="row mx-0">
    <?php
        $message = $question->message;
        $content = $message->message_version;
        $author = $message->get_author();
        $score = $message->score;
    ?>
        <div class="col-sm-2 py-3 border-right rounded-left d-flex flex-column justify-content-around bg-light">
            <div>
                <div>
                    <p class="text-center font-weight-bold mb-0 w-100">Answers</p>
                    <p class="text-center mb-0 w-100"><?=$question->get_num_answers()?></p>
                </div>
            </div>
            <div>
                <div class="row mx-0">
                    <p class="text-center font-weight-bold mb-2 w-100">Votes</p>
                    <p class="text-center mb-0 w-100"><?=$score?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="card-body">
                <h5 class="card-title"><?=$question->title?></h5>

                <p class="card-text"><?=substr($content->content, 0, 240)?>...</p>
            </div>
            <div class="card-footer bg-transparent d-flex justify-content-between">
                <p class="card-text mb-0">
                    <small class="text-muted">Created by - &nbsp</small><?=$author->username?>
                </p>
                <div class="ml-2 mr-auto">
                    <span></span>
                    <span class="badge badge-success"><?=$author->getBadge()?></span>
                </div>
                <div>
                    @each('partials.category', $message->categories, 'category')
                </div>
            </div>
        </div>
    </div>
</a>
