function searchCenteredPalindrome(s: string, left: number, right: number): string {
    while (left >= 0 && right < s.length && s[left] === s[right]) {
        left--;
        right++;
    }
    return s.substring(left + 1, right);
}

function palindrome(str: string): string {
    let result = "";
    const len = str.length;

    if (len < 2) return str;

    for (let i = 0; i < len; i++) {
        // Check for odd-length palindromes
        const pal1 = searchCenteredPalindrome(str, i, i);
        // Check for even-length palindromes
        const pal2 = searchCenteredPalindrome(str, i, i + 1);

        if (pal1.length > result.length) {
            result = pal1;
        }
        if (pal2.length > result.length) {
            result = pal2;
        }
    }

    return result;
}

interface ExpectedTest {
    input: string;
    output: string;
}

const expected: ExpectedTest[] = [
    { input: "abac", output: "aba" },
    { input: "tacag", output: "aca" },
    { input: "wegeeksskeegyuwe", output: "geeksskeeg" }
];

expected.forEach(expect => {
    console.log(palindrome(expect.input) === expect.output ? "ok" : "invalid");
});
