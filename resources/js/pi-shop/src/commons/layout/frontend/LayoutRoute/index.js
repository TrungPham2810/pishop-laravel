import React, { Component } from "react";
import { Route, BrowserRouter, Switch } from "react-router-dom";
import DashBoard from "../../../../components/DashBoard";
import { withRouter} from "react-router";
class LayoutRoute extends Component {
  render() {
    const { path, component: YourComponent, exact, name } = this.props;
    return (
      <Route
        path={path}
        exact={exact}
        component={YourComponent}
        // render={(props) => {
        //   return (
        //     <DashBoard name={name}>
        //       <YourComponent />
        //     </DashBoard>
        //   );
        // }}
      />
    );
  }
}
export default withRouter(LayoutRoute);
