@extends('layouts.base')

@section('body')
<div class="row justify-content-center">
    <div class="col-md-4">
        <form action="{{route('panel.fibonacci')}}" method="get">
            @csrf

            <div class="mb-3">
                <label for="number">{{trans('label.panel.fibonacci.number')}}</label>
                <input class="form-control" type="text" id="number" name="number" value="{{old('number',request()->get('number',null))}}" placeholder="{{trans('label.panel.fibonacci.number')}}">
            </div>


            <button type="submit" class="btn btn-dark">{{trans('label.submit')}}</button>

            <div class="alert alert-success mt-3">
                {{number_format($fibonacci)}}
            </div>
        </form>
    </div>


    <div class="col-md-9">
<div class="alert alert-info">
    <strong>Note:</strong>
     To be honest, I took this test many times in different universities and companies, which I have memorized like my date of birth, but I tried to write a more useful explanation.
</div>
        <pre>
<code>
if ($n < 0) {
    throw new \InvalidArgumentException(trans('message.invalidFibonacciNumber'));
}

if ($n === 0) {
    return 0;
}

if ($n === 1) {
    return 1;
}

$previous = 0;
$current = 1;

for ($i = 2; $i <= $n; $i++) {
    $next = $previous + $current;
    $previous = $current;
    $current = $next;
}

return $current;
</code>
    </pre>
        <h2>Understanding the Steps</h2>
        <ol>
            <li>
                <strong>Checking the Input:</strong>
                <pre><code>
if ($n < 0) {
    throw new \InvalidArgumentException(trans('message.invalidFibonacciNumber'));
}
            </code></pre>
                This part checks if <code>n</code> is a negative number. If yes, it gives an error. This step is very quick, taking the same time no matter what <code>n</code> is. So, it’s <code>O(1)</code>.
            </li>
            <li>
                <strong>Simple Cases:</strong>
                <pre><code>
if ($n === 0) {
    return 0;
}

if ($n === 1) {
    return 1;
}
            </code></pre>
                Here, it checks if <code>n</code> is 0 or 1. These are simple cases, returning 0 or 1 quickly. This step also takes the same time no matter what <code>n</code> is. So, it’s <code>O(1)</code>.
            </li>
            <li>
                <strong>Loop to Calculate Fibonacci:</strong>
                <pre><code>
$previous = 0;
$current = 1;

for ($i = 2; $i <= $n; $i++) {
    $next = $previous + $current;
    $previous = $current;
    $current = $next;
}
            </code></pre>
                The loop runs from 2 to <code>n</code>. For each step, it does some simple math. If <code>n</code> is big, the loop runs many times. So, this step takes more time as <code>n</code> gets bigger. It’s <code>O(n)</code>.
            </li>
            <li>
                <strong>Returning the Result:</strong>
                <pre><code>
return $current;
            </code></pre>
                This just gives back the final answer. It’s very quick, taking the same time no matter what <code>n</code> is. So, it’s <code>O(1)</code>.
            </li>
        </ol>
        <h2>Total Time Taken</h2>
        <p>
            The slowest part is the loop. It takes <code>O(n)</code> time. So, the total time to run this code is:
        </p>
        <p><strong>O(n)</strong></p>
        <p>
            This means if <code>n</code> gets bigger, the time to find the Fibonacci number grows in a straight line. This way is good for big <code>n</code> because it’s much faster than some other ways that are very slow with big numbers.
        </p>


    </div>
</div>
@endsection
