fun searchCenteredPalindrome(s: String, left: Int, right: Int): String {
    var l = left
    var r = right
    while (l >= 0 && r < s.length && s[l] == s[r]) {
        l--
        r++
    }
    // Returns the substring from l+1 up to r (r is exclusive)
    return s.substring(l + 1, r)
}

fun palindrome(str: String): String {
    var result = ""
    val len = str.length

    if (len < 2) return str

    for (i in 0 until len) {
        // Check for odd-length palindromes
        val pal1 = searchCenteredPalindrome(str, i, i)
        // Check for even-length palindromes
        val pal2 = searchCenteredPalindrome(str, i, i + 1)

        if (pal1.length > result.length) {
            result = pal1
        }
        if (pal2.length > result.length) {
            result = pal2
        }
    }

    return result
}

fun main() {
    val expected = listOf(
        mapOf("input" to "abac", "output" to "aba"),
        mapOf("input" to "tacag", "output" to "aca"),
        mapOf("input" to "wegeeksskeegyuwe", "output" to "geeksskeeg")
    )

    for (expect in expected) {
        val input = expect["input"]!!
        val output = expect["output"]!!
        println(if (palindrome(input) == output) "ok" else "invalid")
    }
}
