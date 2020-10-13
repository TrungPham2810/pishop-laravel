const styles = (theme) => ({
  header: {
    background: theme.background.color.white,
  },
  topbar: {
    border: "none",
    padding: "12px 0",
  },
  topLeft: {},
  logo: {
    position: "relative",
    zIndex: 100,
    display: "inline-block",
  },
  listMain: {
    textAlign: "left",
    padding: 0,
    "&>li": {
      fontSize: 13,
      fontWeight: 500,
      padding: 7,
      borderBottom: "1px solid #eee",
    },
    [theme.breakpoints.up("sm")]: {
      display: "flex",
      justifyContent: "center",
      "&>li": {
        borderRight: "1px solid #f0f0f0",
        borderBottom: "none",
      },
      "&>li:first-child": {
        paddingLeft: 0,
      },
      "&>li:last-child": {
        borderRight: "none",
        paddingRight: 0,
      },
    },
  },

  topRight: {
    "&>ul>li:last-child": {
      border: "none",
    },
    [theme.breakpoints.up("lg")]: {
      float: "right",
    },
  },

  icon: {
    display: "none",
    color: theme.color.icon,
    fontSize: 15,
    top: 1,
    marginRight: 3,
    position: "relative",
    [theme.breakpoints.up("sm")]: {
      display: "inline-block",
    },
  },
  link: {
    display: "inline-block",
    color: "#333",
    "&:hover, &:focus": {
      textDecoration: "none",
      color: theme.color.icon,
    },
  },

  formControl: {
    margin: theme.spacing(1),
    minWidth: 120,
    fontSize: 14,
    fontFamily: "Poppins",
    "&> select:focus": {
      background: theme.background.color.white,
    },
  },
  middleInner: {
    borderTop: "1px solid #eee",
    padding: "20px 0",
  },
  searchBarTop: {
    display: "none",
    "@media (min-width: 768px)": {
      display: "block",
      textAlign: "center",
    },
  },
  searchType: {
    width: "30%",
    display: "inline",
  },
  search: {
    width: "70%",
  },
  searchForm: {
    display: "inline-block",
    width: "100%",
    position: "relative",
    borderLeft: "1px solid #ececec",
    "& > input": {
      width: "80%",
      height: 48,
      color: "#666",
      border: "none",
      paddingLeft: 5,
      "&:focus": {
        outline: "none",
      },
    },
    "& > button": {
      width: "20%",
      height: 51,
      transform: "translateX(1px)",
      background: "#333333",
      border: "none",
      borderRadius: "0 5px 5px 0",
      transition: "all 0.4s ease",
    },
    "& > button:hover": {
      background: theme.color.icon,
    },
  },
  iconSearch: {
    color: theme.background.color.white,
    fontSize: 20,
  },
  searchBar: {
    display: "flex",
    textAlign: "center",
    border: "1px solid #ececec",
    borderRadius: "5px",
    width: 460,
    margin: "auto",
    "@media (min-width: 992px)": {
      width: 500,
    },
  },
  rightBar: {
    display: "none",
    "@media (min-width: 768px)": {
      display: "flex",
      justifyContent: "flex-end",
      marginTop: 10,
    },
  },

  singleBar: {
    marginRight: 25,
  },
  singleIcon: {
    position: "relative",
    fontSize: 20,
    color: "#333",
    "&:hover": {
      color: theme.color.icon,
    },
  },

});

export default styles;
