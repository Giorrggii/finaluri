<form action="{{ route('quiz.create') }}" method="post">
    @csrf
    <label for="title">სათაური მაგალითად:</label>
    <input type="text" id="title" name="title" required>
    
    <label for="description">აღწერა:</label>
    <textarea id="description" name="description" required></textarea>
    
    <button type="submit">შექმნა</button>
</form>
