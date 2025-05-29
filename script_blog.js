document.addEventListener("DOMContentLoaded", function () {
    const blogPosts = [
        {
            title: "<b>How AI is Transforming Expense Tracking</b>",
            image: "images/blog8.jpg",
            excerpt: "<b>Artificial Intelligence is revolutionizing financial tracking and budgeting. Learn how it benefits you!</b>",
            link: "blog-ai-expense.html"
        },
        {
            title: "<b>Best Budgeting Apps for 2025</b>",
            image: "images/blog7.jpg",
            excerpt: "<b>Explore the top budgeting apps to manage your expenses effectively this year.</b>",
            link: "blog-budgeting-apps.html"
        },
        {
            title: "<b>The Future of Digital Banking</b>",
            image: "images/blog19.jpg",
            excerpt: "<b>Find out how digital banking is shaping the way we handle finances securely.</b>",
            link: "blog-digital-banking.html"
        }
    ];

    const blogContainer = document.getElementById("blogPosts");
    blogContainer.innerHTML = ""; // Clear previous content

    blogPosts.forEach(post => {
        const blogHTML = `
            <div class="blog-card" onclick="window.location.href='${post.link}';">
                <img src="${post.image}" alt="${post.title}">
                <h3>${post.title}</h3>
                <p>${post.excerpt}</p>
                <a href="${post.link}">Read More</a>
            </div>
        `;
        blogContainer.innerHTML += blogHTML;
    });
});
