@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Question Preview</h5>
                    </div>

                    <div class="ibox-content">
                        <form  method="POST" class="form-horizontal">
                            <div class="row">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="m-b-sm" style="font-size: 14px">
                                            {{ $question->question }}
                                        </label>
                                        @if($question->question_type_id==1)
                                            @foreach($question_options as $option)
                                                <div class="">
                                                    <label>
                                                        <input name="options[]" value="{{ $option->id }}" {{  isset($true_correct_answers) && in_array($option->id, $true_correct_answers) ? 'checked' : '' }} type="checkbox">
                                                        <i></i> {{ $option->option }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif

                                        @if($question->question_type_id==2)
                                            <?php $i=1; ?>
                                            @foreach($question_options as $option)
                                                @if($i==1)
                                                    <div>True False</div>
                                                @endif

                                                <div class="">
                                                    <input name="options_true[]" value="{{ $option->id }}" {{  isset($true_correct_answers) && in_array($option->id, $true_correct_answers) ? 'checked' : '' }} type="checkbox"> &nbsp;&nbsp;&nbsp;
                                                    <input name="options_false[]" value="{{ $option->id }}" {{  isset($false_correct_answers) && in_array($option->id, $false_correct_answers) ? 'checked' : '' }} type="checkbox"> &nbsp;&nbsp;&nbsp;
                                                    <label>
                                                        <i></i> {{ $option->option }}
                                                    </label>
                                                </div>
                                                <?php $i++; ?>
                                            @endforeach
                                        @endif
                                    </div>

                                    @if($question->description)
                                        <label>
                                            <u>Explanation:</u>  <?php echo $question->description ?>
                                        </label><br><br>
                                    @endif

                                    @if($question->image)
                                        <label>
                                            <img src="{{ asset('admin/uploads/images/question/'.$question->image) }}" style="height: 150px; width: 150px" class="">
                                        </label><br><br>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection